<?php

namespace App\Filament\Resources\Estoques\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EstoqueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('produto_id')
                    ->required()
                    ->numeric(),
                Select::make('transacao')
                    ->options(['entrada' => 'Entrada', 'saida' => 'Saida'])
                    ->required(),
                TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
                Textarea::make('observacoes')
                    ->columnSpanFull(),
            ]);
    }
}
