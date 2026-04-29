<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User_Regiao;
use App\Traits\HttpResponse;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Ability;
use Illuminate\Http\Request;


class UserController extends Controller
{
    use AuthorizesRequests, HttpResponse;
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $authUser = $request->user();

    $query = User::with('user_regiao')->where('tipo_usuario', 'user');

    if ($authUser->tipo_usuario !== "admin") {
        $query->where('id', $authUser->id);
    }

    $users = $query->paginate(10);

    $users->getCollection()->transform(function ($user) {
        $fields = array_diff($user->getFillable(), $user->getHidden());

        return array_merge(
            $user->only($fields),
            [
                'regiao' => $user->user_regiao->regiao ?? null
            ]
        );
    });

    return response()->json([
        'message' => 'Colaboradores encontrados',
        'status' => 200,
        'data' => $users->items(),
        'pagination' => [
            'current_page' => $users->currentPage(),
            'last_page'    => $users->lastPage(),
            'per_page'     => $users->perPage(),
            'total'        => $users->total(),
        ]
    ], 200);
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
    public function store(UserRequest $request)
    { 
        $this->authorize('create', User::class);
        
         $credentials = $request->validated();

         if(!$credentials){
            return $this->error('Dados inválidos', 422,  ['Verifique os dados enviados e tente novamente']);
         }

           $ativo = $credentials['ativo'] ?? true;

            $user = User::create([
                'nome'        => $credentials['nome'],
                'email'       => $credentials['email'],
                'telefone'    => $credentials['telefone'],
                'password'    => $credentials['telefone'],
                'ativo'       => $ativo,
                'tipo_usuario' => $credentials['tipo_usuario'] ?? 'user',
            ]);

            $regiao = User_Regiao::create([
                'user_id' => $user->id,
                'regiao'  => $credentials['regiao'],
                'ativo'   => $ativo,
            ]);
            if ($user->tipo_usuario === 'admin') {
               $abilities = Ability::pluck('id', 'id');
            $user->abilities()->sync($abilities);
            } else {
            $abilities = User::where('nome', [
                    'User.update',
                    'User.edit',
                    'User.destroy',
                    'Medico.update',
                    'Medico.edit',
                    'Medico.destroy',
                ])->pluck('id');

                $user->abilities()->sync($abilities);
            }

            return response()->json([
                'message' => 'Colaborador criado com sucesso',
                'status'=>201,
                'data'=>[
                    'user' => $user,
                    'regiao' => $regiao
                ]
            ], 201);
    }

    /**
     * Display the specified resource.
     */

public function show(User $user)
{
   //
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
         $this->authorize('view', $user);

    $userRegiao = User_Regiao::query()->where('user_id', $user->id)->first();

    if ($user->tipo_usuario !== 'user' || !$userRegiao) {
        return $this->error(
            'Colaborador não encontrado',
            404,
            ['Colaborador não encontrado']
        );
    }

    return $this->response(
        'Colaborador encontrado',
        200,
        [
            'user' => $user,
            'regiao' => $userRegiao
        ]
    );
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(UpdateRequest $request, User $user)
{
      if(Auth::user()->tipo_usuario !== 'admin'){
         if ($user->id !== $request->user()->id) {
        return $this->error(
            'Acesso negado',
            403,
            ['Você não tem permissão para atualizar este usuário']
        );
    }
    }
    $user->update ([
        'nome' => $request->nome,
        'email' => $request->email,
        'telefone' => $request->telefone,
        'ativo' => $request->ativo,
    ]);

  $userRegiao = User_Regiao::query()->where('user_id', $user->id)->first();

if ($request->regiao) {
    if ($userRegiao) {
       
        $userRegiao->update([
            'regiao' => $request->regiao,
            'ativo' => $request->ativo,
        ]);
    } else {
        
        $userRegiao = User_Regiao::create([
            'user_id' => $user->id,
            'regiao' => $request->regiao,
            'ativo' => $request->ativo,
        ]);
    }
}
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(int $id)
{
   $user = User::findOrFail($id);

    if (!$user) {
        return $this->error('Usuário não encontrado', 404, [
            'Usuário com o ID especificado não existe'
        ]);
    }

    $authUser = auth()->guard('sanctum')->user();

    if ($user->tipo_usuario === 'admin' && $authUser->tipo_usuario !== 'admin') {
        return $this->error('Usuário não encontrado', 404);
    }

    try {
        $user->delete();

        return $this->response('Colaborador excluído com sucesso', 200);
    } catch (\Throwable $e) {
        return $this->error('Erro ao excluir o colaborador', 500, [
            'Ocorreu um erro ao tentar excluir o colaborador. Tente novamente mais tarde.'
        ]);
    }
}
}

