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
            ['nome'=>'ability.index'],//1
            ['nome' =>'User.create'],//2
            ['nome' =>'User.store'],//3
            ['nome' =>'User.show'],//4
            ['nome' =>'User.edit'],//5
            ['nome'=>'User.update'],//6
            ['nome'=>'User.destroy'],//7
            ['nome'=>'User.view_any'],//8

            ['nome'=>'Medico.index'],//9
            ['nome' =>'Medico.create'],//10
            ['nome' =>'Medico.store'],//11
            ['nome' =>'Medico.show'],//12
            ['nome' =>'Medico.edit'],//13
            ['nome'=>'Medico.update'],//14
            ['nome'=>'Medico.destroy'],//15
            ['nome'=>'Medico.view_any'],//16

            ['nome'=>'Produto.index'],//17
            ['nome' =>'Produto.create'],//18
            ['nome' =>'Produto.store'],//19
            ['nome' =>'Produto.show'],//20
            ['nome' =>'Produto.edit'],//21
            ['nome'=>'Produto.update'],//22
            ['nome'=>'Produto.destroy'],//23
            ['nome'=>'Produto.view_any'],//24

            ['nome'=>'Visita.index'],//25
            ['nome' =>'Visita.create'],//26
            ['nome' =>'Visita.store'],//27
            ['nome' =>'Visita.show'],//28
            ['nome' =>'Visita.edit'],//29
            ['nome'=>'Visita.update'],//30
            ['nome'=>'Visita.destroy'],//31
            ['nome'=>'Visita.view_any'],//32
        ];

        foreach ($abilities as $ability) {
            \App\Models\Ability::create($ability);
        }
    }
}
