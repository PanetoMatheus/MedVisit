<?php

namespace App\Models\Produtos;


use Illuminate\Database\Eloquent\Model;
use App\Models\Medico;
use App\Models\Produtos\Produto;

class Medico_produto extends Model
{
    protected $fillable = [
        'medico_id',
        'produto_id',
        'produto_foco'
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
