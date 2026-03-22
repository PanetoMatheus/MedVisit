<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User_Regiao;
use App\Traits\HttpResponse;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Ability;

class UserController extends Controller
{
    use AuthorizesRequests, HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users=User::where('tipo_usuario', 'user')->get();

        if($users){
            return response()->json([
                'message' => 'Colaboradores encontrados',
                'status'=>200,
                'data'=>$users
            ], 200);
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
    public function store(UserRequest $request)
    { 
        $this->authorize('create', User::class);
        
         $credentials = $request->validated();

         if(!$credentials){
            return $this->error('Dados inválidos', 422,  ['Verifique os dados enviados e tente novamente']);
         }

            $user = User::create([
                'nome' => $credentials['nome'],
                'email' => $credentials['email'],
                'telefone' => $credentials['telefone'],
                'password' => $credentials['telefone'],
                'ativo' => $credentials['ativo'],
                'tipo_usuario' => $credentials['tipo_usuario'] ?? 'user'
            ]);
            $regiao = User_Regiao::create([
                'user_id' => $user->id,
                'regiao' => $credentials['regiao'],
                'ativo' => $credentials['ativo'],
            ]);
    if ($user->tipo_usuario === 'admin') {
    $abilities = Ability::pluck('id');
    $user->abilities()->sync($abilities);

} else {

    $abilities = Ability::whereIn('name', [
        'User.update',
        'User.edit',
        'User.destroy',
        'Medico.update',
        'Medico.edit',
        'Medico.destroy'
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

    $userRegiao = User_Regiao::where('user_id', $user->id)->first();

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
   public function update(UserRequest $request, User $user)
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

    $userRegiao = User_Regiao::where('user_id', $user->id)->first();

    if ($request->regiao && $userRegiao && $userRegiao->regiao !== $request->regiao) {
        $userRegiao->update([
            'regiao' => $request->regiao,
            'ativo' => $request->ativo,
        ]);
    }

    return $this->response(
        'Colaborador atualizado com sucesso',
        200,
        [
            'user' => $user->fresh(),
            'regiao' => $userRegiao
        ]
    );
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Request $request)
    {
         if (Auth::user()->id !== User::find($user->id)->id) {
        return $this->error(
            'Acesso negado',
            403,
            ['Você não tem permissão para atualizar este usuário']
         );
         }

        if(!$user){
            return $this->error(
                'Colaborador não encontrado',
                404,
                ['Colaborador não encontrado']
            );
        }
        $user->softDelete();
        return $this->response(
            'Colaborador deletado com sucesso',
            200
        );
    }
}
