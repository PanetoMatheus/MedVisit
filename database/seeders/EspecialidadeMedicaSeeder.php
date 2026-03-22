<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadeMedicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Especialidades = [
            'Cardiologia',
            'Dermatologia',
            'Endocrinologia',
            'Gastroenterologia',
            'Neurologia',
            'Pediatria',
            'Psiquiatria',
            'Reumatologia',
            'Oncologia',
            'Oftalmologia',
        ];
        foreach ($Especialidades as $especialidade) {
            \App\Models\EspecialidadeMedica::create(['nome' => $especialidade]);
        }
    }
}
