<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name'  => 'Administrador',
            'email' => 'admin@confeccao.com',
        ]);

        $this->call([
            ClienteSeeder::class,
            FornecedorSeeder::class,
            ProdutoSeeder::class,
            InsumoSeeder::class,
            PedidoSeeder::class,
            EstoqueSeeder::class,
        ]);
    }
}
