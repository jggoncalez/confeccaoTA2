<?php

namespace App\Filament\Widgets;

use App\Models\ItemPedido;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MyWidget extends ChartWidget
{
    protected static ?int $sort = 4;

    protected ?string $heading = 'Top 6 Produtos Mais Vendidos';
    protected ?string $subheading = 'Quantidade total vendida por produto';

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $top = ItemPedido::query()
            ->select('produto_id', DB::raw('SUM(quantidade) as total_vendido'))
            ->groupBy('produto_id')
            ->orderByDesc('total_vendido')
            ->limit(6)
            ->with('produto')
            ->get();

        return [
            'datasets' => [
                [
                    'label'           => 'Unidades vendidas',
                    'data'            => $top->pluck('total_vendido')->toArray(),
                    'backgroundColor' => [
                        '#f59e0b', '#3b82f6', '#22c55e',
                        '#ef4444', '#8b5cf6', '#06b6d4',
                    ],
                    'borderColor'     => '#ffffff',
                    'borderWidth'     => 2,
                ],
            ],
            'labels' => $top->map(fn ($item) => $item->produto?->nome ?? 'N/A')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
