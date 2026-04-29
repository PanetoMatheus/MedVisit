<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Traits\HttpResponse;
use App\Models\Produtos\Produto;

class ProdutoController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $produtos = Produto::with(['categoria', 'unidadeMedida'])->paginate(10);

    return $this->response('Produtos encontrados', 200, $produtos);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        $validated = $request->validated();
         $produto = Produto::create($validated);
        return $this->response('Produto criado com sucesso', 201, $produto);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::with(['categoria', 'unidadeMedida'])->find($id);
        if (!$produto) {
            return $this->error('Produto não encontrado', 404); 
    }
        return $this->response('Produto encontrado', 200, $produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $id)
    {
        $produto = Produto::with(['categoria', 'unidadeMedida'])->find($id);
        if (!$produto) {
            return $this->error('Produto não encontrado', 404);
        }

        $validated = $request->validated();
       try {
            $produto->update($validated);
             return $this->response('Produto atualizado com sucesso', 200, $produto);
        } catch (\Exception $e) {
            return $this->error('Erro ao atualizar o produto: ' . $e->getMessage(), 500);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $produto = Produto::findOrFail($id);
        if(!$produto){
            return $this->error(
                'Produto não encontrado',
                404,
                ['Produto não encontrado']
            );
        }
        $produto->delete();
        return $this->response(
            'Produto deletado com sucesso',
            200,
            'Produto excluido'
        );
    }

    public function produtoEspecialidade(){
        $produtos = Produto::with(['categoria'])->get()->groupBy('produto_categoria_id');

        return $this->response("Produtos por categoria", 200, $produtos);
    }
}
