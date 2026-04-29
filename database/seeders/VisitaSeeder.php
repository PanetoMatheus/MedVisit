<?php

namespace Database\Seeders;

use App\Models\AvaliacaoProduto;
use App\Models\Medico;
use App\Models\Produtos\Produto;
use App\Models\User;
use App\Models\Visitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where(['tipo_usuario' => 'user', 'ativo' => 1])->pluck('id')->toArray();
        $medicos = Medico::where('ativo',1)->pluck('id')->toArray();
        $produtos = Produto::where('ativo', 1)->pluck('id')->toArray();

         $faker = \Faker\Factory::create('pt_BR');
     for ($i = 0; $i < 50; $i++) {
    $visita = Visitas::create([
        'user_id'        => $users[array_rand($users)],
        'medico_id'      => $medicos[array_rand($medicos)],
        'data_visita'    => now()->addDays(rand(1, 30)),
        'horario_visita' => now()->addMinutes(rand(1, 1440))->format('H:i'),
        'observacoes'    => $faker->sentence(),
        'proximos_passos' => $faker->sentence(),
    ]);

    for ($j = 0; $j < rand(1, 5); $j++) {
        AvaliacaoProduto::create([
            'visitas_id'  => $visita->id,
            'produto_id' => $produtos[array_rand($produtos)],
            'avaliacao'  => rand(0, 10),
        ]);
    }
    }
}
}
