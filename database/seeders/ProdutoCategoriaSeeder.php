<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias=[
             'Cardiologia',
            'Dermatologia',
            'Endocrinologia',
            'Gastroenterologia',
            'Neurologia',
            'Pediatria',
            'Psiquiatria',
            'Reumatologia',
            'Oncologia',
            'Oftalmologia',
        ];

        foreach ($categorias as $categoria) {
            \App\Models\Produtos\Produto_categoria::create([
                'nome' => $categoria,
                'ativo' => true
            ]);
        }
    }
}
