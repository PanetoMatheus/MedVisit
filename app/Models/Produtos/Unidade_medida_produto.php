<?php

namespace App\Models\Produtos;

use Illuminate\Database\Eloquent\Model;

class Unidade_medida_produto extends Model
{
    protected $table = 'unidade_medida_produtos';

    protected $fillable = [
        'nome',
        'sigla',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'unidade_medida_produto_id');
    }
}
