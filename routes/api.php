<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoControllerApi;
use App\Http\Controllers\AuthController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


//RUTA LOG IN
Route::post('/login', [AuthController::class, 'login']);


//RUTA REGISTRO
Route::post('/register', [AuthController::class, 'register']);


// Rutas API para proyectos
Route::get('/proyectosAPI', [ProyectoControllerApi::class, 'get']);
Route::get('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'getById']);
Route::post('/proyectosAPI', [ProyectoControllerApi::class, 'post']);
Route::patch('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'update']);
Route::delete('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'delete']);
