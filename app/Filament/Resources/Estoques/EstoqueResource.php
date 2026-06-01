<?php

namespace App\Filament\Resources\Estoques;

use App\Filament\Resources\Estoques\Pages\CreateEstoque;
use App\Filament\Resources\Estoques\Pages\EditEstoque;
use App\Filament\Resources\Estoques\Pages\ListEstoques;
use App\Filament\Resources\Estoques\Pages\ViewEstoque;
use App\Models\Estoque;
use BackedEnum;
use UnitEnum;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;

class EstoqueResource extends Resource
{
    protected static ?string $model = Estoque::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|UnitEnum|null $navigationGroup = 'Estoque';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'Movimentações de Estoque';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
            Select::make('produto_id')
                ->relationship('produto', 'nome')
                ->required()
                ->preload()
                ->searchable()
                ->label('Produto'),
            Select::make('transacao')
                ->options([
                'entrada' => 'Entrada',
                'saida' => 'Saída',
                ])
                ->required()
                ->label('Transação'),
            TextInput::make('quantidade')
                ->required()
                ->numeric()
                ->minValue(0)
                ->label('Quantidade'),
            Textarea::make('observacoes')
                ->label('Observações')
                ->rows(3)
                ->maxLength(255),
            Repeater::make('itens')
                ->label('Itens')
                ->schema([
                Select::make('produto_id')
                    ->relationship('produto', 'nome')
                    ->required()
                    ->preload()
                    ->searchable()
                    ->label('Produto'),
                TextInput::make('quantidade')
                    ->label('Quantidade')
                    ->numeric()
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Get $get, Set $set) =>
                    self::calcularTotal($get, $set))
                    ->columnSpan(1),
                ]),
            ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('produto.nome')->searchable()->sortable()->label('Produto'),
                TextColumn::make('transacao')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'entrada' => 'success',
                        'saida'   => 'danger',
                        default   => 'gray',
                    })
                    ->sortable()
                    ->label('Transação'),
                TextColumn::make('quantidade')->numeric()->sortable()->label('Quantidade'),
                TextColumn::make('observacoes')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Observações'),
                TextColumn::make('created_at')
                    ->label('Data')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('transacao')
                    ->label('Transação')
                    ->options([
                        'entrada' => 'Entrada',
                        'saida'   => 'Saída',
                    ]),
                Filter::make('created_at')
                    ->label('Período')
                    ->form([
                        DatePicker::make('from')->label('De'),
                        DatePicker::make('until')->label('Até'),
                    ])
                    ->query(fn (Builder $query, array $data) => $query
                        ->when($data['from'],  fn ($q, $v) => $q->whereDate('created_at', '>=', $v))
                        ->when($data['until'], fn ($q, $v) => $q->whereDate('created_at', '<=', $v))
                    ),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEstoques::route('/'),
            'create' => CreateEstoque::route('/create'),
            'view' => ViewEstoque::route('/{record}'),
            'edit' => EditEstoque::route('/{record}/edit'),
        ];
    }
}
