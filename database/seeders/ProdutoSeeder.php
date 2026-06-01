<?php

namespace Database\Seeders;

use App\Models\Produtos;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            ['nome' => 'Camiseta Básica Feminina',    'descricao' => 'Camiseta 100% algodão manga curta',    'preco' => '45.00',  'quantidade' => '120'],
            ['nome' => 'Calça Jeans Feminina',         'descricao' => 'Calça jeans skinny 5 bolsos',          'preco' => '129.90', 'quantidade' => '60'],
            ['nome' => 'Vestido Floral Midi',          'descricao' => 'Vestido estampado floral comprimento midi','preco' => '98.00',  'quantidade' => '45'],
            ['nome' => 'Blusa Social Feminina',        'descricao' => 'Blusa em viscose com botões',           'preco' => '72.00',  'quantidade' => '55'],
            ['nome' => 'Shorts Casual Masculino',      'descricao' => 'Shorts moletom com cordão',             'preco' => '58.00',  'quantidade' => '80'],
            ['nome' => 'Jaqueta Jeans Unissex',        'descricao' => 'Jaqueta jeans oversized lavagem clara', 'preco' => '189.90', 'quantidade' => '30'],
            ['nome' => 'Saia Midi Rodada',             'descricao' => 'Saia midi plissada com cinto',          'preco' => '82.00',  'quantidade' => '40'],
            ['nome' => 'Polo Masculina Piquet',        'descricao' => 'Camisa polo malha piquet com bordado',  'preco' => '76.00',  'quantidade' => '70'],
            ['nome' => 'Bermuda Masculina Sarja',      'descricao' => 'Bermuda sarja com bolso cargo',         'preco' => '65.00',  'quantidade' => '65'],
            ['nome' => 'Body Feminino Manga Longa',    'descricao' => 'Body em malha canelada com botões',     'preco' => '48.00',  'quantidade' => '90'],
            ['nome' => 'Moletom Unissex com Capuz',    'descricao' => 'Moletom 70% algodão 30% poliéster',     'preco' => '145.00', 'quantidade' => '35'],
            ['nome' => 'Regata Masculina Dry-Fit',     'descricao' => 'Regata esportiva tecido dry-fit',       'preco' => '38.00',  'quantidade' => '100'],
            ['nome' => 'Conjunto Feminino Cropped',    'descricao' => 'Conjunto cropped + calça flare',        'preco' => '118.00', 'quantidade' => '25'],
            ['nome' => 'Camisa Social Masculina',      'descricao' => 'Camisa social slim fit manga longa',    'preco' => '95.00',  'quantidade' => '50'],
        ];

        foreach ($produtos as $produto) {
            Produtos::create($produto);
        }
    }
}
