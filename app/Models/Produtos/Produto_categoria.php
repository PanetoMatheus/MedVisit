<?php

namespace App\Models\Produtos;

use Illuminate\Database\Eloquent\Model;

class Produto_categoria extends Model
{
    protected $table = 'produto_categorias';

    protected $fillable = [
        'nome',
        'ativo',
    ];

     public function produtos()
    {
        return $this->hasMany(Produto::class, 'produto_categoria_id');
    }
}
