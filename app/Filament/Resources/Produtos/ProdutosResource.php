<?php

namespace App\Filament\Resources\Produtos;

use App\Filament\Resources\Produtos\Pages\CreateProdutos;
use App\Filament\Resources\Produtos\Pages\EditProdutos;
use App\Filament\Resources\Produtos\Pages\ListProdutos;
use App\Filament\Resources\Produtos\Pages\ViewProdutos;
use App\Filament\Resources\Produtos\Schemas\ProdutosForm;
use App\Filament\Resources\Produtos\Schemas\ProdutosInfolist;
use App\Filament\Resources\Produtos\Tables\ProdutosTable;
use App\Models\Produtos;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ProdutosResource extends Resource
{
    protected static ?string $model = Produtos::class;
    protected static string|UnitEnum|null $navigationGroup = 'Estoque';
    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Produtos';

    public static function form(Schema $schema): Schema
    {
        return $schema
        ->components([
            TextInput::make('nome') -> required()->label('Nome'),
            TextInput::make('descricao') ->label('Descrição'),
            TextInput::make('preco') ->label('Preço')->numeric()->prefix('R$')->step(0.01),
            TextInput::make('quantidade')->label('Quantidade')->numeric()->step(0.01),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProdutosInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')->searchable()->sortable(),
                TextColumn::make('descricao')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('preco')->money('BRL')->sortable()->label('Preço'),
                TextColumn::make('quantidade')->numeric()->sortable()->label('Estoque'),
            ])
            ->filters([
                Filter::make('estoque_baixo')
                    ->label('Estoque baixo (< 30 unidades)')
                    ->query(fn (Builder $query) => $query->where('quantidade', '<', 30)),
                Filter::make('sem_estoque')
                    ->label('Sem estoque')
                    ->query(fn (Builder $query) => $query->where('quantidade', '<=', 0)),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProdutos::route('/'),
            'create' => CreateProdutos::route('/create'),
            'view' => ViewProdutos::route('/{record}'),
            'edit' => EditProdutos::route('/{record}/edit'),
        ];
    }
}
