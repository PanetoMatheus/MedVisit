<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null find($id, $columns = ['*'])
 */
class Visitas extends Model
{
    protected $fillable = [
        'id',
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
        return $this->belongsTo(User::class, 'user_id');
    }
    public function AvaliacaoProduto()
    {
        return $this->hasMany(AvaliacaoProduto::class, 'visitas_id');
    }

}
