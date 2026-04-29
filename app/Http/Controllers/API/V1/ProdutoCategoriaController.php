<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Produtos\Produto_categoria;
use App\Traits\HttpResponse;

class ProdutoCategoriaController extends Controller
{
    use HttpResponse;
    public function index()
{
    $categorias = Produto_categoria::where('ativo', 1)->get();
    return $this->response('Categorias encontradas', 200, $categorias);
}
}
