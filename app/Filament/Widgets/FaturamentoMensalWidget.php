<?php

namespace App\Filament\Widgets;

use App\Models\Pedido;
use Filament\Widgets\ChartWidget;

class FaturamentoMensalWidget extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $heading = 'Faturamento Mensal';
    protected ?string $subheading = 'Receita de pedidos concluídos nos últimos 12 meses';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $labels  = [];
        $valores = [];

        for ($i = 11; $i >= 0; $i--) {
            $mes      = now()->subMonths($i);
            $labels[] = $mes->format('M/y');
            $valores[] = (float) Pedido::where('status', 'concluido')
                ->whereYear('created_at', $mes->year)
                ->whereMonth('created_at', $mes->month)
                ->sum('valor_total');
        }

        return [
            'datasets' => [
                [
                    'label'           => 'Faturamento (R$)',
                    'data'            => $valores,
                    'borderColor'     => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                    'fill'            => true,
                    'tension'         => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
