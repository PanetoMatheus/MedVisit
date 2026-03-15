<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponse;

public function login(LoginRequest $request)
{
    $credentials = $request->validated();

    if (!Auth::attempt($credentials)) {
        return $this->error(
            'Invalid credentials', 401,['E-mail ou senha incorretos'] );
    }
/** @var \App\Models\User $loggedUser */
$loggedUser = Auth::user();

$abilities = ['user'];

if ($loggedUser->tipo_usuario === 'admin') {
    $abilities = ['admin'];
}

$token = $loggedUser->createToken('auth_token', $abilities)->plainTextToken;

    return $this->response(
        'Login successful',
        200,
        [
            'token' => $token
        ]
    );
}

    public function logout()
    {
        /** @var \App\Models\User $loggedUser */
        $loggedUser = Auth::user();
        $loggedUser->tokens()->delete();

        return $this->response('Logout successful', 200);
     
    }
}