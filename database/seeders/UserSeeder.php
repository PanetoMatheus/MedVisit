<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
    User::create([
    'name' => 'Matheus Paneto',
    'email' => 'matheus.paneto@sou.fae.br',
    'telefone' => '1997830584',
    'tipo_usuario' => 'admin',
    'password' => Hash::make('12345678')
]);
    }
}