<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\User_Regiao;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
    User::create([
    'nome' => 'Matheus Paneto',
    'email' => 'matheus.paneto@sou.fae.br',
    'telefone' => '1997830584',
    'tipo_usuario' => 'admin',
    'password' => Hash::make('12345678')
]);

    User::create([
    'nome' => 'Representante Um',
    'email' => 'representante1@sou.fae.br',
    'telefone' => '1997830585',
    'tipo_usuario' => 'user',
    'password' => Hash::make('12345678')
]);

 $faker = \Faker\Factory::create('pt_BR');

    for($id=0;$id<50;$id++){
      $rep=User::create([
        'nome' => $faker->name(),
        'email' => $faker->unique()->safeEmail(),
        'telefone' => $faker->numerify('199########'),
        'tipo_usuario' => 'user',
        'password' => Hash::make('12345678')
      ]);

      User_Regiao::create([
        'user_id' => $rep->id,
        'regiao' => $faker->city(),
        'ativo' => true,
      ]);

      
    }

    
    }
}