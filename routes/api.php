<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\DashboardController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\MedicoController;
use App\Http\Controllers\API\V1\ProdutoController;
use App\Http\Controllers\API\V1\VisitaController;
use App\Http\Controllers\API\V1\EspecialidadeMedicaController;
use App\Http\Controllers\API\V1\ProdutoCategoriaController;
use App\Http\Controllers\API\V1\UnidadeMedidaProdutoController;

Route::prefix('v1')->group(function(){

    Route::middleware('guest')->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/especialidades', [EspecialidadeMedicaController::class, 'index'])->name('especialidades.index');
    Route::get('/produto-categorias', [ProdutoCategoriaController::class, 'index'])->name('produtoCategoria.index');
    Route::get('/unidade-medida-produtos', [UnidadeMedidaProdutoController::class, 'index'])->name('unidadeMedidaProduto.index');
    Route::get('/produtoEspecialidade', [ProdutoController::class, 'produtoEspecialidade'])->name('produto.produtoEspecialidade');
    });

    Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');

    Route::put('/users/{user}', [UserController::class,'update'])->middleware('tipo.user:User.update')->name('users.update');
    Route::delete('/users/{user}', [UserController::class,'destroy'])->middleware('tipo.user:User.destroy')->name('users.destroy');
    Route::post('/users', [UserController::class,'store'])->middleware('tipo.user:User.store')->name('users.store');
    Route::get('/users', [UserController::class,'index'])->middleware('tipo.user:User.viewAny')->name('users.index');
    Route::put('/medicos/{medico}', [MedicoController::class,'update'])->middleware('tipo.user:Medico.update')->name('medicos.update');
    Route::delete('/medicos/{medico}', [MedicoController::class,'destroy'])->middleware('tipo.user:Medico.destroy')->name('medicos.destroy');
    Route::post('/medicos', [MedicoController::class,'store'])->middleware('tipo.user:Medico.store')->name('medicos.store');
    Route::get('/medicos', [MedicoController::class,'index'])->middleware('tipo.user:Medico.viewAny')->name('medicos.index');
    Route::get('/produtos', [ProdutoController::class,'index'])->middleware('tipo.user:Produto.viewAny')->name('produtos.index');
    Route::post('/produtos', [ProdutoController::class,'store'])->middleware('tipo.user:Produto.store')->name('produtos.store');
    Route::put('/produtos/{produto}', [ProdutoController::class,'update'])->middleware('tipo.user:Produto.update')->name('produtos.update');
    Route::get('/produtos/{produto}', [ProdutoController::class,'show'])->middleware('tipo.user:Produto.view')->name('produtos.show');
    Route::delete('/produtos/{produto}', [ProdutoController::class,'destroy'])->middleware('tipo.user:Produto.destroy')->name('produtos.destroy');

    Route::get('/visitas', [VisitaController::class,'index'])->middleware('tipo.user:Visita.viewAny')->name('visitas.index');
    Route::post('/visitas', [VisitaController::class,'store'])->middleware('tipo.user:Visita.store')->name('visitas.store');
    Route::get('/visitas/{visita}', [VisitaController::class,'show'])->middleware('tipo.user:Visita.view')->name('visitas.show');
    Route::put('/visitas/{visita}', [VisitaController::class,'update'])->middleware('tipo.user:Visita.update')->name('visitas.update');
    Route::delete('/visitas/{visita}', [VisitaController::class,'destroy'])->middleware('tipo.user:Visita.destroy')->name('visitas.destroy');


    Route::get('/totalVisitas', [DashboardController::class, 'totalVisita'])->name('dashboard.getVisitas');
    Route::get('/mediaVisitaUsuario', [DashboardController::class, 'mediaVisitaRepresentante'])->middleware('tipo.user:Dashboard.mediaVisitaUsuario')->name('dashboard.mediaVisitaRepresentante');
    Route::get('/qespecialidades', [DashboardController::class, 'quantidadeespecialidade'])->name('dashboard.quantidadeespecialidade');

    Route::get('/especialidadeMaisVisitas', [DashboardController::class, 'especialidadeMaisVisitas' ])->name('dashboard.especialidadeMaisVisitas');

    Route::get('/me',function (Request $request) {
    return response()->json([
        'user' => $request->user()
    ]);
    });


    });
});