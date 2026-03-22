<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Routing\Controller;
use App\Http\Requests\VisitaRequest;
use App\Models\Visitas;
use App\Traits\HttpResponse;
use App\Models\AvaliacaoProduto;
use Illuminate\Support\Facades\DB;
use App\Models\Produtos\Medico_produto;
class VisitaController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitas = Visitas::with(['medico', 'representante', 'produto'])->get();

        return $this->success($visitas);
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
    'observacao' => $validated['observacoes'] ?? null,
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
        $visita = Visitas::find($id);

        if (!$visita) {
            return $this->error('Visita não encontrada', 404);
        }

        $validated = $request->validated();
       
        Visitas::where('id', $id)->update($validated);

        return $this->response("Visita atualizada com sucesso", 201, $visita);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visita = Visitas::find($id);

        if (!$visita) {
            return $this->error('Visita não encontrada', 404);
        }

        Visitas::where('id', $id)->delete();

        return $this->success(null, 204);
    }
}
