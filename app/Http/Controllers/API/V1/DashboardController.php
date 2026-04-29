<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\EspecialidadeMedica;
use App\Models\Medico;
use App\Models\Visitas;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use HttpResponse;
    public function totalVisita(Request $request){

    try {
       $user = $request->user();

        $visitas = Visitas::all();
        $qVisita = $visitas->count();


        if($user->tipo_usuario !== 'admin'){
            $visitas= $visitas->where('user_id', $user->id);
            $qVisita = $visitas->count();
        }

        return $this->response("Total de visitas encontradas", 200, $qVisita);
    } catch (\Throwable $th) {
        return $this->error("Erro ao buscar o total de visitas", 500, [$th->getMessage()]);
    }
    }

    public function mediaVisitaRepresentante(Request $request){
        try {
              $user = $request->user();

         if($user->tipo_usuario !=='admin'){
            return $this->error("Você não possui permissão para acessar", 401);
         }

         $mediaVisita = Visitas::avg('user_id');

         return $this->response("Media de visita por usuario", 200, $mediaVisita);
        } catch (\Throwable $th) {
            return $this->error("Não foi possível obter a media de visitas por representantes", 500, [$th->getMessage()]);
        }
      
    }

    public function quantidadeespecialidade(Request $request){
        try {
        $user = $request ->user();
        $especialidades = EspecialidadeMedica::all();
        $qespecialidade = $especialidades ->count();

        if($user->tipo_usuario !== 'admin'){
            $medicos = Medico::all();
            $medicoUsuario = $medicos ->where('user_id', $user->id);
            $quantidadeMedico = $medicoUsuario->count('especialidade_medica_id');
            return $this->response("Quantidade de especialidade medicas encontradas com sucesso!", 200, $quantidadeMedico);
        }

        return $this->response("Quantidade de especialidade medicas encontradas com sucesso!", 200, $qespecialidade);
        } catch (\Throwable $th) {
            return $this->error("Erro", 500, [$th->getMessage()]);
        }
      
    }

    public function especialidadeMaisVisitas(Request $request){
        $user = $request->user();

        if($user->tipo_usuario === 'admin'){
          
        }
    }
}
