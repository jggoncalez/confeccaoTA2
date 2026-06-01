<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    public function run(): void
    {
        $fornecedores = [
            [
                'nome'      => 'Têxtil Brasil Indústria LTDA',
                'email'     => 'vendas@textilbrasil.com.br',
                'telefone'  => '(11) 3456-7890',
                'documento' => '10.234.567/0001-89',
                'cidade'    => 'São Paulo',
                'cep'       => '01310-000',
            ],
            [
                'nome'      => 'Tecidos São Paulo Comércio',
                'email'     => 'contato@tecidosp.com.br',
                'telefone'  => '(11) 98765-4321',
                'documento' => '20.345.678/0001-90',
                'cidade'    => 'São Paulo',
                'cep'       => '03001-000',
            ],
            [
                'nome'      => 'Linha & Agulha Distribuidora',
                'email'     => 'pedidos@linhaeagulha.com',
                'telefone'  => '(31) 3567-8901',
                'documento' => '30.456.789/0001-01',
                'cidade'    => 'Belo Horizonte',
                'cep'       => '30130-010',
            ],
            [
                'nome'      => 'Aviamentos Nordeste EIRELI',
                'email'     => 'vendas@aviamentos-ne.com.br',
                'telefone'  => '(81) 3678-9012',
                'documento' => '40.567.890/0001-12',
                'cidade'    => 'Recife',
                'cep'       => '50010-000',
            ],
            [
                'nome'      => 'Malhas e Tecidos Sul LTDA',
                'email'     => 'comercial@malhasul.com.br',
                'telefone'  => '(51) 3789-0123',
                'documento' => '50.678.901/0001-23',
                'cidade'    => 'Porto Alegre',
                'cep'       => '90010-000',
            ],
            [
                'nome'      => 'Confex Insumos Têxteis ME',
                'email'     => 'compras@confexinsumos.com',
                'telefone'  => '(41) 3890-1234',
                'documento' => '60.789.012/0001-34',
                'cidade'    => 'Curitiba',
                'cep'       => '80010-000',
            ],
            [
                'nome'      => 'Bordados & Estampas Rio',
                'email'     => 'atendimento@bordadosrio.com.br',
                'telefone'  => '(21) 3901-2345',
                'documento' => '70.890.123/0001-45',
                'cidade'    => 'Rio de Janeiro',
                'cep'       => '20010-000',
            ],
            [
                'nome'      => 'Etiquetas e Embalagens BR',
                'email'     => 'vendas@etiquetasbr.com.br',
                'telefone'  => '(61) 3012-3456',
                'documento' => '80.901.234/0001-56',
                'cidade'    => 'Brasília',
                'cep'       => '70040-010',
            ],
        ];

        foreach ($fornecedores as $fornecedor) {
            Fornecedor::create($fornecedor);
        }
    }
}
