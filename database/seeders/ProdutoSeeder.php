<?php

namespace Database\Seeders;

use App\Models\Produtos\Produto;
use App\Models\Produtos\Produto_categoria;
use App\Models\Produtos\Unidade_medida_produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Produto_categoria::where('ativo', true)->pluck('id')->toArray();
        $unidades = Unidade_medida_produto::where('ativo', true)->pluck('id')->toArray();

        for($i = 0; $i < 15; $i++) {
            Produto::create([
                'nome' => 'Produto ' . ($i + 1),
                'produto_categoria_id' => $categorias[array_rand($categorias)],
                'unidade_medida_produto_id' => $unidades[array_rand($unidades)],
                'preco' => rand(10, 1000) / 10,
                'ativo' => true,
            ]);
        }
    }
}
