<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Support\Facades\Route;




Route::prefix('v1')->group(function(){

Route::middleware('guest')->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

});

Route::middleware('auth:sanctum')->group(function(){
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


});


});
