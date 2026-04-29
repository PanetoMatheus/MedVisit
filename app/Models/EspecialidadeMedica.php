<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EspecialidadeMedica extends Model
{
    protected $table = 'especialidade_medicas';

    protected $fillable = [
        'id',
        'nome',
        'ativo',
    ];
     protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class, 'especialidade_medica_id');
    }
}