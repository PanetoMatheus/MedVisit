<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\produtos\Produto;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $fillable = [
        'user_id',
        'nome',
        'especialidade_medica_id',
        'ativo'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function especialidadeMedica()
    {
        return $this->belongsTo(EspecialidadeMedica::class, 'especialidade_medica_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Medico_cidades()
    {
        return $this->hasMany(Medico_Cidade::class, 'medico_id');
    }

   public function produtos(): BelongsToMany
{
    return $this->belongsToMany(Produto::class, 'medico_produtos');
}
public function visitas()
{
    return $this->hasMany(Visitas::class, 'medico_id');
}

}