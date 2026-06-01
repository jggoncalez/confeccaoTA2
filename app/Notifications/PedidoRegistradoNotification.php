<?php

namespace App\Notifications;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PedidoRegistradoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Pedido $pedido
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $pedido  = $this->pedido->loadMissing('cliente', 'itens');
        $valor   = 'R$ ' . number_format((float) $pedido->valor_total, 2, ',', '.');
        $cliente = $pedido->cliente?->nome ?? 'N/A';
        $itens   = $pedido->itens->count();

        return (new MailMessage)
            ->subject('Pedido #' . $pedido->id . ' registrado')
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Um novo pedido foi registrado no sistema de confecção.')
            ->line('**Pedido:** #' . $pedido->id)
            ->line('**Cliente:** ' . $cliente)
            ->line('**Itens:** ' . $itens . ' produto(s)')
            ->line('**Valor total:** ' . $valor)
            ->action('Ver Pedido', url('/admin/pedidos/' . $pedido->id))
            ->line('Obrigado por usar o sistema!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'pedido_id'   => $this->pedido->id,
            'cliente'     => $this->pedido->cliente?->nome,
            'valor_total' => $this->pedido->valor_total,
        ];
    }
}
