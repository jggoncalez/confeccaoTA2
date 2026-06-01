<?php

namespace Database\Seeders;

use App\Models\Insumo;
use Illuminate\Database\Seeder;

class InsumoSeeder extends Seeder
{
    public function run(): void
    {
        $insumos = [
            ['nome' => 'Tecido Algodão Penteado', 'unidade_medida' => 'm',        'preco_custo' => 9.50,  'estoque' => 650],
            ['nome' => 'Tecido Jeans Denim',       'unidade_medida' => 'm',        'preco_custo' => 17.80, 'estoque' => 280],
            ['nome' => 'Tecido Malha Canelada',    'unidade_medida' => 'm',        'preco_custo' => 6.90,  'estoque' => 420],
            ['nome' => 'Tecido Viscose Estampada', 'unidade_medida' => 'm',        'preco_custo' => 13.50, 'estoque' => 180],
            ['nome' => 'Tecido Moletom Flanelado', 'unidade_medida' => 'm',        'preco_custo' => 19.00, 'estoque' => 150],
            ['nome' => 'Linha de Costura Poliéster','unidade_medida' => 'carretel', 'preco_custo' => 2.80,  'estoque' => 200],
            ['nome' => 'Botão Camisa 4 Furos',     'unidade_medida' => 'pacote',   'preco_custo' => 3.50,  'estoque' => 300],
            ['nome' => 'Zíper Nylon 20cm',         'unidade_medida' => 'unidade',  'preco_custo' => 1.40,  'estoque' => 400],
            ['nome' => 'Elástico Chato 3cm',       'unidade_medida' => 'm',        'preco_custo' => 0.90,  'estoque' => 800],
            ['nome' => 'Entretela Termocolante',   'unidade_medida' => 'm',        'preco_custo' => 5.20,  'estoque' => 120],
            ['nome' => 'Etiqueta de Composição',   'unidade_medida' => 'rolo',     'preco_custo' => 18.00, 'estoque' => 60],
            ['nome' => 'Agulha Industrial 16x1',   'unidade_medida' => 'caixa',    'preco_custo' => 22.00, 'estoque' => 40],
        ];

        foreach ($insumos as $insumo) {
            Insumo::create($insumo);
        }
    }
}
