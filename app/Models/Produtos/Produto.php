<?php

namespace App\Models\Produtos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\AvaliacaoProduto;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'nome',
        'produto_categoria_id',
        'unidade_medida_produto_id',
        'preco',
        'ativo',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

      public function categoria()
    {
        return $this->belongsTo(Produto_categoria::class, 'produto_categoria_id');
    }

    public function unidadeMedida()
    {
        return $this->belongsTo(Unidade_medida_produto::class, 'unidade_medida_produto_id');
    }
    public function medicos(): BelongsToMany
{
    return $this->belongsToMany(\App\Models\Medico::class, 'medico_produtos');
}
public function AvaliacaoProduto()
{
    return $this->hasMany(AvaliacaoProduto::class, 'produto_id');

}

}