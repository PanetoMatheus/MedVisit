<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico_cidade extends Model
{
    protected $table = 'medico_cidades';

    protected $fillable = [
        'id',
        'cidade',
        'medico_id',
    ];

     protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
