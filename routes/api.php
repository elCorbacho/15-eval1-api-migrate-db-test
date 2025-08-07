<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoControllerApi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/proyectosAPI', [ProyectoControllerApi::class, 'get']);
Route::get('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'getById']);
Route::post('/proyectosAPI', [ProyectoControllerApi::class, 'post']);
Route::patch('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'update']);
Route::delete('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'delete']);
