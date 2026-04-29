<?php

namespace Database\Seeders;

use App\Models\Ability;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $users = User::all();
    $abilities = Ability::all();

   $abilitiespadrao = [9,14,17,25,27,30];

   for($i=0; $i<count($users); $i++){
    if($users[$i]->tipo_usuario == 'admin'){
        $users[$i]->abilities()->attach($abilities);
    }else{
        $users[$i]->abilities()->attach($abilitiespadrao);

    }
   }
}
}
