<?php

namespace Database\Seeders;

use App\Models\Estoque;
use App\Models\Produtos;
use Illuminate\Database\Seeder;

class EstoqueSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = Produtos::all()->values();

        // Entradas iniciais para todos os produtos
        $entradas = [
            [0, 150, 'Estoque inicial - Camiseta Básica Feminina'],
            [1, 80,  'Estoque inicial - Calça Jeans Feminina'],
            [2, 60,  'Estoque inicial - Vestido Floral Midi'],
            [3, 70,  'Estoque inicial - Blusa Social Feminina'],
            [4, 100, 'Estoque inicial - Shorts Casual Masculino'],
            [5, 50,  'Estoque inicial - Jaqueta Jeans Unissex'],
            [6, 55,  'Estoque inicial - Saia Midi Rodada'],
            [7, 90,  'Estoque inicial - Polo Masculina Piquet'],
            [8, 85,  'Estoque inicial - Bermuda Masculina Sarja'],
            [9, 110, 'Estoque inicial - Body Feminino Manga Longa'],
            [10, 50, 'Estoque inicial - Moletom Unissex com Capuz'],
            [11, 130,'Estoque inicial - Regata Masculina Dry-Fit'],
            [12, 40, 'Estoque inicial - Conjunto Feminino Cropped'],
            [13, 65, 'Estoque inicial - Camisa Social Masculina'],
        ];

        foreach ($entradas as [$idx, $qty, $obs]) {
            Estoque::create([
                'produto_id'  => $produtos[$idx]->id,
                'transacao'   => 'entrada',
                'quantidade'  => $qty,
                'observacoes' => $obs,
                'created_at'  => '2024-12-15',
                'updated_at'  => '2024-12-15',
            ]);
        }

        // Reposições ao longo do ano
        $reposicoes = [
            [0, 200, 'Reposição lote 01/2025',  '2025-03-01'],
            [1, 50,  'Reposição lote 01/2025',  '2025-03-01'],
            [4, 80,  'Reposição lote 02/2025',  '2025-06-01'],
            [7, 60,  'Reposição lote 02/2025',  '2025-06-01'],
            [0, 250, 'Reposição lote 03/2025',  '2025-09-01'],
            [10, 40, 'Reposição lote 03/2025',  '2025-09-01'],
            [5, 30,  'Reposição lote 03/2025',  '2025-09-01'],
            [0, 300, 'Reposição lote 04/2025',  '2025-11-01'],
            [11, 100,'Reposição lote 04/2025',  '2025-11-01'],
            [9, 80,  'Reposição lote 04/2025',  '2025-11-01'],
        ];

        foreach ($reposicoes as [$idx, $qty, $obs, $date]) {
            Estoque::create([
                'produto_id'  => $produtos[$idx]->id,
                'transacao'   => 'entrada',
                'quantidade'  => $qty,
                'observacoes' => $obs,
                'created_at'  => $date,
                'updated_at'  => $date,
            ]);
        }

        // Saídas por vendas (amostra representativa)
        $saidas = [
            [0, 30,  'Venda pedido Jan/2025',  '2025-01-25'],
            [7, 18,  'Venda pedido Jan/2025',  '2025-01-25'],
            [1, 9,   'Venda pedido Fev/2025',  '2025-02-22'],
            [5, 8,   'Venda pedido Fev/2025',  '2025-02-22'],
            [0, 55,  'Venda pedido Mar/2025',  '2025-03-30'],
            [10, 8,  'Venda pedido Mar/2025',  '2025-03-30'],
            [0, 55,  'Venda pedido Abr/2025',  '2025-04-28'],
            [4, 15,  'Venda pedido Abr/2025',  '2025-04-28'],
            [0, 70,  'Venda pedido Jun/2025',  '2025-06-30'],
            [11, 45, 'Venda pedido Jun/2025',  '2025-06-30'],
            [0, 95,  'Venda pedido Ago/2025',  '2025-08-15'],
            [4, 20,  'Venda pedido Ago/2025',  '2025-08-15'],
            [0, 110, 'Venda pedido Out/2025',  '2025-10-30'],
            [9, 20,  'Venda pedido Out/2025',  '2025-10-30'],
            [0, 130, 'Venda pedido Nov/2025',  '2025-11-25'],
            [7, 20,  'Venda pedido Nov/2025',  '2025-11-25'],
            [0, 180, 'Venda pedido Dez/2025',  '2025-12-30'],
            [11, 40, 'Venda pedido Dez/2025',  '2025-12-30'],
        ];

        foreach ($saidas as [$idx, $qty, $obs, $date]) {
            Estoque::create([
                'produto_id'  => $produtos[$idx]->id,
                'transacao'   => 'saida',
                'quantidade'  => $qty,
                'observacoes' => $obs,
                'created_at'  => $date,
                'updated_at'  => $date,
            ]);
        }
    }
}
