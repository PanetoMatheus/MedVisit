<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    protected $fillable = [
        'data_visita',
        'horario_visita',
        'medico_id',
        'user_id',
        'observacoes',
        'proximos_passos',
        'status'
    ];

    protected $hidden =[
        'created_at',
        'updated_at'
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function representante()
    {
        return $this->belongsTo(User::class, 'representante_id');
    }
    public function AvaliacaoProduto()
    {
        return $this->hasMany(AvaliacaoProduto::class, 'visita_id');
    }

}
