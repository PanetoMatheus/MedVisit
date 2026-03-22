<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class abilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            ['nome'=>'ability.index'],
            ['nome' =>'User.create'],
            ['nome' =>'User.store'],
            ['nome' =>'User.show'],
            ['nome' =>'User.edit'],
            ['nome'=>'User.update'],
            ['nome'=>'User.destroy'],
            ['nome'=>'User.view_any'],

            ['nome'=>'Medico.index'],
            ['nome' =>'Medico.create'],
            ['nome' =>'Medico.store'],
            ['nome' =>'Medico.show'],
            ['nome' =>'Medico.edit'],
            ['nome'=>'Medico.update'],
            ['nome'=>'Medico.destroy'],
            ['nome'=>'Medico.view_any'],

            ['nome'=>'Produto.index'],
            ['nome' =>'Produto.create'],
            ['nome' =>'Produto.store'],
            ['nome' =>'Produto.show'],
            ['nome' =>'Produto.edit'],
            ['nome'=>'Produto.update'],
            ['nome'=>'Produto.destroy'],
            ['nome'=>'Produto.view_any'],

            ['nome'=>'Visita.index'],
            ['nome' =>'Visita.create'],
            ['nome' =>'Visita.store'],
            ['nome' =>'Visita.show'],
            ['nome' =>'Visita.edit'],
            ['nome'=>'Visita.update'],
            ['nome'=>'Visita.destroy'],
            ['nome'=>'Visita.view_any'],
        ];

        foreach ($abilities as $ability) {
            \App\Models\Ability::create($ability);
        }
    }
}
