<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Models\Produtos\Unidade_medida_produto;

class UnidadeMedidaProdutoController extends Controller
{
    use HttpResponse;
    
    public function index(){
    $unidades = Unidade_medida_produto::all();
    return $this->response('Unidades encontradas', 200, $unidades);
}
}
