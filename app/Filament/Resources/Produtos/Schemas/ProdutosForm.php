<?php

namespace App\Filament\Resources\Produtos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProdutosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                Textarea::make('descricao')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('preco')
                    ->required()
                    ->numeric(),
                TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
            ]);
    }
}
