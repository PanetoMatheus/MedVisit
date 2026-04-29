<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponse;



public function login(LoginRequest $request)
{
    try {
        $loggedUser = User::where('email', $request->email)->first();

        if (!$loggedUser || !Hash::check($request->password, $loggedUser->password)) {
            return $this->error('Credenciais inválidas', 401);
        }

        $token = $loggedUser->createToken('auth_token', expiresAt: now()->addMonth())->plainTextToken;

        return $this->response(
            'Login successful', 200, ['token' => $token,'user' => $loggedUser]
        );

    } catch (\Throwable $th) {
        return $this->error(
            'Ocorreu um erro ao tentar fazer login',
            500,
            ['error' => $th->getMessage()]
        );
    }
}

    public function logout()
    {
        /** @var \App\Models\User $loggedUser */
        $loggedUser = Auth::user();
        $loggedUser->tokens()->delete();

        return $this->response('Logout successful', 200);
     
    }
}