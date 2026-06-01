<?php

namespace App\Filament\Widgets;

use App\Models\Cliente;
use App\Models\Pedido;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $faturamentoTotal = Pedido::where('status', 'concluido')->sum('valor_total');

        $faturamentoMesAtual = Pedido::where('status', 'concluido')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('valor_total');

        $faturamentoMesAnterior = Pedido::where('status', 'concluido')
            ->whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('valor_total');

        $variacaoFaturamento = $faturamentoMesAnterior > 0
            ? round((($faturamentoMesAtual - $faturamentoMesAnterior) / $faturamentoMesAnterior) * 100, 1)
            : 0;

        $totalPedidos    = Pedido::count();
        $pedidosPendentes = Pedido::where('status', 'pendente')->count();
        $pedidosAndamento = Pedido::where('status', 'em_andamento')->count();

        $ultimos6Meses = [];
        for ($i = 5; $i >= 0; $i--) {
            $mes = now()->subMonths($i);
            $ultimos6Meses[] = Pedido::where('status', 'concluido')
                ->whereYear('created_at', $mes->year)
                ->whereMonth('created_at', $mes->month)
                ->sum('valor_total');
        }

        $pedidosPorMes = [];
        for ($i = 5; $i >= 0; $i--) {
            $mes = now()->subMonths($i);
            $pedidosPorMes[] = Pedido::whereYear('created_at', $mes->year)
                ->whereMonth('created_at', $mes->month)
                ->count();
        }

        return [
            Stat::make('Faturamento Total', 'R$ ' . number_format($faturamentoTotal, 2, ',', '.'))
                ->description($variacaoFaturamento >= 0
                    ? "+{$variacaoFaturamento}% em relação ao mês anterior"
                    : "{$variacaoFaturamento}% em relação ao mês anterior")
                ->descriptionIcon($variacaoFaturamento >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($variacaoFaturamento >= 0 ? 'success' : 'danger')
                ->chart($ultimos6Meses),

            Stat::make('Total de Pedidos', $totalPedidos)
                ->description("{$pedidosAndamento} em andamento")
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary')
                ->chart($pedidosPorMes),

            Stat::make('Pedidos Pendentes', $pedidosPendentes)
                ->description('Aguardando início da produção')
                ->descriptionIcon('heroicon-m-clock')
                ->color($pedidosPendentes > 5 ? 'danger' : 'warning'),

            Stat::make('Total de Clientes', Cliente::count())
                ->description('Clientes cadastrados')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
        ];
    }
}
