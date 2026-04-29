<?php

namespace Database\Seeders;

use App\Models\EspecialidadeMedica;
use App\Models\Medico;
use App\Models\Medico_cidade;
use App\Models\Produtos\Medico_produto;
use App\Models\Produtos\Produto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $faker = \Faker\Factory::create('pt_BR');
            $especialidades = EspecialidadeMedica::where('ativo', true)->pluck('id')->toArray();
            $representantes = User::where(['tipo_usuario' => 'user', 'ativo' => true])->pluck('id')->toArray();
            $produtos = Produto::where('ativo', true)->pluck('id')->toArray();

            for($id=0;$id<50;$id++){
                $medico = Medico::create([
                    'nome' => $faker->name(),
                    'especialidade_medica_id' =>  $especialidades[array_rand($especialidades)],
                    'user_id' => $representantes[array_rand($representantes)],
                    'ativo' => true,
                ]);

                $cidade = Medico_cidade::create([
                    'cidade' => $faker->city(),
                    'medico_id' => $medico->id,
                ]);

                $qprodutos = rand(1, 5); 
                for ($i = 0; $i < $qprodutos; $i++) {
                $medicoProduto = Medico_produto::create([
                    'medico_id' => $medico->id,
                    'produto_id' => $produtos[array_rand($produtos)],
                ]);
                }

    }
}
}
