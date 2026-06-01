<?php

namespace App\Filament\Widgets;

use App\Models\Pedido;
use Filament\Widgets\ChartWidget;

class PedidosPorStatusWidget extends ChartWidget
{
    protected static ?int $sort = 3;

    protected ?string $heading = 'Pedidos por Status';
    protected ?string $subheading = 'Distribuição dos pedidos por situação atual';

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $pendente     = Pedido::where('status', 'pendente')->count();
        $emAndamento  = Pedido::where('status', 'em_andamento')->count();
        $concluido    = Pedido::where('status', 'concluido')->count();

        return [
            'datasets' => [
                [
                    'data'            => [$pendente, $emAndamento, $concluido],
                    'backgroundColor' => ['#f59e0b', '#3b82f6', '#22c55e'],
                    'borderColor'     => ['#d97706', '#2563eb', '#16a34a'],
                    'borderWidth'     => 2,
                ],
            ],
            'labels' => ['Pendente', 'Em Andamento', 'Concluído'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
