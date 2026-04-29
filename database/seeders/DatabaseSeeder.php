<?php

namespace Database\Seeders;

use App\Models\Medico;
use App\Models\Produtos\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            abilitySeeder::class,
            UserAbilitySeeder::class,
            EspecialidadeMedicaSeeder::class,
            ProdutoCategoriaSeeder::class,
             UnidadeMedidaProdutoSeeder::class,
             ProdutoSeeder::class,
            MedicoSeeder::class,
            VisitaSeeder::class,
        ]);
    }
}