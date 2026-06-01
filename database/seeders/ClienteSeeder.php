<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = [
            ['nome' => 'Maria Aparecida Silva',    'email' => 'maria.silva@gmail.com',     'telefone' => '(11) 98765-4321', 'documento' => '234.567.890-12'],
            ['nome' => 'Ana Carolina Souza',        'email' => 'ana.souza@hotmail.com',     'telefone' => '(21) 97654-3210', 'documento' => '345.678.901-23'],
            ['nome' => 'João Pedro Santos',         'email' => 'joao.santos@gmail.com',     'telefone' => '(31) 96543-2109', 'documento' => '456.789.012-34'],
            ['nome' => 'Fernanda Lima',             'email' => 'fernanda.lima@yahoo.com',   'telefone' => '(41) 95432-1098', 'documento' => '567.890.123-45'],
            ['nome' => 'Carlos Eduardo Pereira',    'email' => 'carlos.pereira@gmail.com',  'telefone' => '(51) 94321-0987', 'documento' => '678.901.234-56'],
            ['nome' => 'Juliana Martins',           'email' => 'juliana.martins@gmail.com', 'telefone' => '(61) 93210-9876', 'documento' => '789.012.345-67'],
            ['nome' => 'Roberto Alves Costa',       'email' => 'roberto.costa@outlook.com', 'telefone' => '(71) 92109-8765', 'documento' => '890.123.456-78'],
            ['nome' => 'Patrícia Oliveira',         'email' => 'patricia.oliveira@gmail.com','telefone' => '(81) 91098-7654', 'documento' => '901.234.567-89'],
            ['nome' => 'Loja Moda Feminina ME',     'email' => 'contato@modafeminina.com',  'telefone' => '(11) 3456-7890',  'documento' => '12.345.678/0001-90'],
            ['nome' => 'Boutique Elegance LTDA',    'email' => 'vendas@elegance.com.br',    'telefone' => '(21) 3567-8901',  'documento' => '23.456.789/0001-01'],
            ['nome' => 'Renata Cristina Ferreira',  'email' => 'renata.ferreira@gmail.com', 'telefone' => '(31) 98901-2345', 'documento' => '012.345.678-90'],
            ['nome' => 'Lucas Gabriel Mendes',      'email' => 'lucas.mendes@gmail.com',    'telefone' => '(41) 97890-1234', 'documento' => '123.456.789-01'],
            ['nome' => 'Moda Total Varejo LTDA',    'email' => 'compras@modatotal.com',     'telefone' => '(51) 3678-9012',  'documento' => '34.567.890/0001-12'],
            ['nome' => 'Beatriz Helena Rodrigues',  'email' => 'beatriz.rodrigues@gmail.com','telefone' => '(61) 96789-0123', 'documento' => '234.567.890-23'],
            ['nome' => 'Armazém da Moda EPP',       'email' => 'armazem@modaepp.com.br',   'telefone' => '(71) 3789-0123',  'documento' => '45.678.901/0001-23'],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
