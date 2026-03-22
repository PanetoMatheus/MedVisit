<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos\Produto;
use App\Models\Visitas;

class AvaliacaoProduto extends Model
{
    protected $fillable = [
        'visitas_id',
        'produto_id',
        'avaliacao'
    ];

    protected $hidden =[
        'created_at',
        'updated_at'
    ];

    public function visita()
    {
        return $this->belongsTo(Visitas::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
