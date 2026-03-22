<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeMedidaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidades = [
            ['nome' => 'Unidade', 'sigla' => 'UN'],
            ['nome' => 'Caixa', 'sigla' => 'CX'],
            ['nome' => 'Pacote', 'sigla' => 'PK'],
            ['nome' => 'Litro', 'sigla' => 'L'],
            ['nome' => 'Mililitro', 'sigla' => 'ML'],
            ['nome' => 'Grama', 'sigla' => 'G'],
            ['nome' => 'Miligrama', 'sigla' => 'MG'],
            ['nome' => 'Quilograma', 'sigla' => 'KG'],
            ['nome' => 'Metro', 'sigla' => 'M'],
            ['nome' => 'Centímetro', 'sigla' => 'CM'],
        ];

        foreach ($unidades as $unidade) {
            \App\Models\Produtos\Unidade_medida_produto::create($unidade);
        }
    }
}
