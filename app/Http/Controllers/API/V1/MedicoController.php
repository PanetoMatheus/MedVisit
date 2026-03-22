<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicoRequest;
use App\Models\Medico;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico_cidade;




class MedicoController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medico::with('especialidade', 'representante')->get();

        if($medicos){
            return response()->json([
                'message' => 'Médicos encontrados',
                'status'=>200,
                'data'=>$medicos
            ]);
        }
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
        $medicos = Medico::with('especialidade', 'representante')->where('id', $id)->first();

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
        $medicos = Medico::with('especialidade', 'representante')->where('id', $id)->first()->get();

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
        if(Auth::user()->tipo_usuario !== 'admin'){
        if(Auth::user()->id !== Medico::find($id)->user_id){
            return $this->error('Acesso negado', 403, ['Você não tem permissão para excluir este médico']);
        }
        }

        Medico::where('id', $id)->softDelete();

        return response()->json([
            'message' => 'Médico excluído com sucesso',
            'status'=>200
        ]);
    }
}
