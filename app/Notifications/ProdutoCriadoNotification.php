<?php

namespace App\Notifications;

use App\Models\Produtos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProdutoCriadoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Produtos $produto
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $preco = 'R$ ' . number_format((float) $this->produto->preco, 2, ',', '.');

        return (new MailMessage)
            ->subject('Novo produto cadastrado: ' . $this->produto->nome)
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Um novo produto foi cadastrado no sistema de confecção.')
            ->line('**Produto:** ' . $this->produto->nome)
            ->line('**Descrição:** ' . ($this->produto->descricao ?: 'Sem descrição'))
            ->line('**Preço de venda:** ' . $preco)
            ->line('**Estoque inicial:** ' . $this->produto->quantidade . ' unidades')
            ->action('Ver produto', url('/admin/produtos/' . $this->produto->id))
            ->line('Obrigado por usar o sistema!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'produto_id'   => $this->produto->id,
            'produto_nome' => $this->produto->nome,
            'preco'        => $this->produto->preco,
            'quantidade'   => $this->produto->quantidade,
        ];
    }
}
