<?php

namespace App\Jobs;

use App\Models\Pedido;
use App\Models\User;
use App\Notifications\PedidoRegistradoNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EnviarEmailPedidoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Pedido $pedido,
        public User $usuario
    ) {}

    public function handle(): void
    {
        $this->usuario->notify(new PedidoRegistradoNotification($this->pedido));
    }
}
