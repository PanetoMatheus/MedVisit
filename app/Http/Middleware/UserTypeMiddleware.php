<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\HttpResponse;

class UserTypeMiddleware
{
    use httpResponse;
    public function handle(Request $request, Closure $next, $ability)
    {
        $user = $request->user(); 

        if (!$user) {
         return $this->error('Acesso negado', 403, ['Usuário não autenticado']);
        }

        $temPermissao = DB::table('user_abilities')
            ->join('abilities', 'abilities.id', '=', 'user_abilities.ability_id')
            ->where('user_abilities.user_id', $user->id)
            ->where('abilities.nome', $ability)
            ->exists();

        if (!$temPermissao) {
            return response()->json([
                'message' => 'Sem permissão'
            ], 403);
        }

        return $next($request);
    }
}
