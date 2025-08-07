<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\ProyectoControllerApi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/proyectosAPI', [ProyectoControllerApi::class, 'get']); // Obtener todos los proyectos
Route::get('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'getById']); // Obtener un proyecto por ID
Route::post('/proyectosAPI', [ProyectoControllerApi::class, 'post']); // Crear un nuevo proyecto
Route::patch('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'update']); // Actualizar un proyecto
Route::delete('/proyectosAPI/{id}', [ProyectoControllerApi::class, 'delete']); // Eliminar un proyecto
