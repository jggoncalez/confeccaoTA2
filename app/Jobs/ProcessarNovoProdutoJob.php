<?php

namespace App\Jobs;

use App\Models\Produtos;
use App\Models\User;
use App\Notifications\ProdutoCriadoNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessarNovoProdutoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Produtos $produto,
        public User $usuario
    ) {}

    public function handle(): void
    {
        $this->usuario->notify(new ProdutoCriadoNotification($this->produto));
    }
}
