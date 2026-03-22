<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EspecialidadeMedica extends Model
{
    protected $table = 'especialidade_medicas';

    protected $fillable = [
        'nome',
        'ativo',
    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class, 'especialidade_medica_id');
    }
}