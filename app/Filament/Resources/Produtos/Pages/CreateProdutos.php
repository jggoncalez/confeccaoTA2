<?php

namespace App\Filament\Resources\Produtos\Pages;

use App\Filament\Resources\Produtos\ProdutosResource;
use App\Jobs\ProcessarNovoProdutoJob;
use Filament\Resources\Pages\CreateRecord;

class CreateProdutos extends CreateRecord
{
    protected static string $resource = ProdutosResource::class;

    protected function afterCreate(): void
    {
        ProcessarNovoProdutoJob::dispatch($this->record, auth()->user());
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Produto "' . $this->record->nome . '" cadastrado com sucesso!';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
