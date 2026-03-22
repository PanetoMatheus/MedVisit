<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico_cidade extends Model
{
    protected $table = 'medico_cidades';

    protected $fillable = [
        'cidade',
        'medico_id',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
