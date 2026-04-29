<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Routing\Controller;
use App\Http\Requests\VisitaRequest;
use App\Models\Visitas;
use App\Traits\HttpResponse;
use App\Models\AvaliacaoProduto;
use Illuminate\Support\Facades\DB;
use App\Models\Produtos\Medico_produto;
use Illuminate\Http\Request;
class VisitaController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $user = $request->user();
    $query = Visitas::with(['medico', 'representante', 'AvaliacaoProduto.produto']);

    if ($request->filled('periodo')) {
        $query->whereDate('data_visita', $request->periodo);
    }

    if($user->tipo_usuario !== "admin"){
        $query ->where('user_id', $user->id);
    }else{
        if($request->filled('representante')) {
        $query->where('user_id', $request->representante);
    }
    }
    $visitas = $query->paginate(10);

    return $this->response('Visitas encontradas', 200, $visitas);
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
   public function store(VisitaRequest $request)
{
    $validated = $request->validated();

    DB::beginTransaction();

    try {
       $visita = Visitas::create([
    'data_visita' => $validated['data_visita'],
    'horario_visita' => $validated['horario_visita'],
    'medico_id' => $validated['medico_id'],
    'user_id' => $validated['user_id'],
    'observacoes' => $validated['observacoes'] ?? null,
    'proximos_passos' => $validated['proximos_passos'] ?? null,
]);
        foreach ($validated['avaliacoes'] as $avaliacao) {

            AvaliacaoProduto::create([
                'visitas_id' => $visita->id,
                'produto_id' => $avaliacao['produto_id'],
                'avaliacao' => $avaliacao['avaliacao'],
            ]);

            if ($avaliacao['avaliacao'] > 7) {

                Medico_Produto::updateOrCreate(
                    [
                        'medico_id' => $visita->medico_id,
                        'produto_id' => $avaliacao['produto_id'],
                    ],
                    [
                        'produto_foco' => true,
                    ]
                );
            }
        }

        DB::commit();

        return $this->response("Visita criada com sucesso", 201, $visita);

    } catch (\Exception $e) {

        DB::rollBack();

        return $this->error('Erro ao criar visita: ' . $e->getMessage(), 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $visita = Visitas::with(['medico', 'representante'])->find($id);

        if (!$visita) {
            return $this->error('Visita não encontrada', 404);
        }

        return $this->success($visita);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisitaRequest $request, string $id)
    {
        $visita = Visitas::with(['medico', 'representante', 'AvaliacaoProduto.produto'])->find($id);

        if (!$visita) {
            return $this->error('Visita não encontrada', 404);
        }

        $validated = $request->validated();
        $visita->update($validated);

        return $this->response("Visita atualizada com sucesso", 200, $visita);
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(string $visita)
{
    $visita = Visitas::find($visita);

    if (!$visita) {
      return $this->error('Visita não encontrada', 404);
    }

    $visita->delete();

      return $this->response('Visita excluída com sucesso', 200);
}
}
