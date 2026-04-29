<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Models\EspecialidadeMedica;

class EspecialidadeMedicaController extends Controller
{
    use HttpResponse;
     public function index()
    {
        $especialidades = EspecialidadeMedica::where('ativo', 1)->get();

        return $this->response('Especialidades encontradas', 200, $especialidades);
    }

    
}
