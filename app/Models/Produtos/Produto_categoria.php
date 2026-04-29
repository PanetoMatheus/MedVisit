<?php

namespace App\Models\Produtos;

use Illuminate\Database\Eloquent\Model;

class Produto_categoria extends Model
{
    protected $table = 'produto_categorias';

    protected $fillable = [
        'id',
        'nome',
        'ativo',
    ];
    protected $hidden = [
        "created_at",
        "updated_at"
    ];

     public function produtos()
    {
        return $this->hasMany(Produto::class, 'produto_categoria_id');
    }
}
