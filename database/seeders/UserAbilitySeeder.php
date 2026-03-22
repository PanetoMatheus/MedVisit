<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $abilities = [
            ['user_id'=>1, 'ability_id'=>1],
            ['user_id'=>1, 'ability_id'=>2],
            ['user_id'=>1, 'ability_id'=>3],
            ['user_id'=>1, 'ability_id'=>4],
            ['user_id'=>1, 'ability_id'=>5],
            ['user_id'=>1, 'ability_id'=>6],
            ['user_id'=>1, 'ability_id'=>7],
            ['user_id'=>1, 'ability_id'=>8],
            ['user_id'=>1, 'ability_id'=>9],
            ['user_id'=>1, 'ability_id'=>10],
            ['user_id'=>1, 'ability_id'=>11],
            ['user_id'=>1, 'ability_id'=>12],
            ['user_id'=>1, 'ability_id'=>13],
            ['user_id'=>1, 'ability_id'=>14],
            ['user_id'=>1, 'ability_id'=>15],
            ['user_id'=>1, 'ability_id'=>16],
            ['user_id'=>1, 'ability_id'=>17],
            ['user_id'=>1, 'ability_id'=>18],
            ['user_id'=>1, 'ability_id'=>19],
            ['user_id'=>1, 'ability_id'=>20],
            ['user_id'=>1, 'ability_id'=>21],
            ['user_id'=>1, 'ability_id'=>22],
            ['user_id'=>1, 'ability_id'=>23],
            ['user_id'=>1, 'ability_id'=>24],
            ['user_id'=>1, 'ability_id'=>25],
            ['user_id'=>1, 'ability_id'=>26],
            ['user_id'=>1, 'ability_id'=>27],
            ['user_id'=>1, 'ability_id'=>28],
            ['user_id'=>1, 'ability_id'=>29],
            ['user_id'=>1, 'ability_id'=>30],
            ['user_id'=>1, 'ability_id'=>31],
            ['user_id'=>1, 'ability_id'=>32],
            ['user_id'=>1, 'ability_id'=>33],
            ['user_id'=>1, 'ability_id'=>34],
            ['user_id'=>1, 'ability_id'=>35],
            ['user_id'=>1, 'ability_id'=>36],
        ];

        foreach ($abilities as $ability) {
            \App\Models\User_ability::create($ability);
        }
    }
}
