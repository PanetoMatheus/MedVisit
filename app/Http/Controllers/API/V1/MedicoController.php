<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicoRequest;
use App\Models\Medico;
use App\Traits\HttpResponse;
use App\Models\Medico_cidade;
use Illuminate\Http\Request;



class MedicoController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $user = $request->user(); 

    $query = Medico::with(['EspecialidadeMedica', 'user', 'Medico_cidades','produtos']);

    $especialidade = $request->input('especialidade');
    $representante = $request->input('representante');

    if ($especialidade) {
        $query->whereHas('EspecialidadeMedica', function ($q) use ($especialidade) {
            $q->where('nome', $especialidade);
        });
    }

    if ($user->tipo_usuario !== 'admin') {
        $query->where('user_id', $user->id);
    } else {
        if ($representante) {
            $query->where('user_id', $representante);
        }
    }

    $medicos = $query->paginate(10);

    return $this->response('Médicos encontrados', 200, $medicos);
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
 public function store(MedicoRequest $request)
{
    $medicData = $request->validated();

    $medico = Medico::create([
        'nome' => $medicData['nome'],
        'especialidade_medica_id' => $medicData['especialidade_medica_id'],
        'user_id' => $medicData['representante_id'],
        'ativo' => $medicData['status'] ?? true
    ]);

    foreach ($medicData['cidades'] as $cidade) {
        Medico_cidade::create([
            'cidade' => $cidade,
            'medico_id' => $medico->id
        ]);
    }

    $medico->produtos()->attach($medicData['produtos']);

    return response()->json([
        'message' => 'Médico criado com sucesso',
        'status' => 201,
        'data' => $medico
    ], 201);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicos = Medico::with(['especialidade', 'representante'])->where('id', $id)->first();

        if($medicos){
            return response()->json([
                'message' => 'Médicos encontrados',
                'status'=>200,
                'data'=>$medicos
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicos = Medico::with(['especialidade', 'representante'])->where('id', $id)->first();

        if($medicos){
            return response()->json([
                'message' => 'Médicos encontrados',
                'status'=>200,
                'data'=>$medicos
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(MedicoRequest $request, string $id)
{
    $medicData = $request->validated();

    $medico = Medico::findOrFail($id);

    $medico->update([
        'nome' => $medicData['nome'],
        'especialidade_medica_id' => $medicData['especialidade_medica_id'],
        'user_id' => $medicData['representante_id'],
        'ativo' => $medicData['status'] ?? true
    ]);

    Medico_cidade::where('medico_id', $id)->delete();

    foreach ($medicData['cidades'] as $cidade) {
        Medico_cidade::create([
            'medico_id' => $id,
            'cidade' => $cidade
        ]);
    }

    $medico->produtos()->sync($medicData['produtos']);

    return response([
        'message' => 'Médico atualizado com sucesso',
        'status' => 200,
        'data' => $medico->load('produtos')
    ]);
}
    

    /**
     * Remove the specified resource from storage.
     */
public function destroy(string $id)
    {
        $medico = Medico::where('id', $id);
        if(!$medico){
            return $this->error(
                'Médico não encontrado',
                404,
                ['Médico não encontrado']
            );
        }
        $medico->delete();
        return $this->response(
            'Médico deletado com sucesso',
            200,
            'Médico excluido'
        );
    }
}
