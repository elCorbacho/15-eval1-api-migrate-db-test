<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;


//http://localhost/15-eval1-api-migrate-db-test/public/proyectos
//http://localhost:8000/proyectos


// Ruta web para la página de inicio, redirige a la lista de proyectos
Route::get('/', function () {
    return redirect('/proyectos');
});



// Ruta para listar todos los proyectos con GET
Route::get('/proyectos', [ProyectoController::class, 'get']);



// Ruta para buscar un proyecto por GET ID
Route::get('/proyecto/buscar', [ProyectoController::class, 'buscarProyecto']);



// Rutas para gestionar el POST de creación de proyecto
    // Ruta para mostrar el formulario web de creación de proyecto
Route::get('/proyectos/crear', function() {
    return view('crear_proyecto');
});

    // Ruta para procesar la creación desde el formulario (POST)
Route::post('/proyectos', [ProyectoController::class, 'post']);



// Rutas para gestionar el PATCH de actualización de proyecto
    // Ruta para mostrar el formulario web de búsqueda de proyecto a editar
Route::get('/proyectos/editar', function() {
    return view('buscar_editar');
});

    // A --> Ruta para buscar el proyecto por ID y visualizar su contenido
Route::get('/proyectos/editar/buscar', [ProyectoController::class, 'buscarEditar']);

    // B --> Ruta para procesar la edición desde el formulario (PATCH)
Route::patch('/proyectos/editar/{id}', [ProyectoController::class, 'update']);

    // C --> Ruta para editar un proyecto existente recibiendo directamente la ID en la ruta WEB (sin uso)
Route::get('/proyectos/editar/{id}', [ProyectoController::class, 'edit']);



// Rutas para gestionar el DELETE de eliminación de proyecto
    // Ruta para mostrar el formulario web de eliminación de proyecto
Route::get('/proyectos/eliminar', function() {
    return view('eliminar_proyecto');
});

    // Ruta para procesar la eliminación desde el formulario (POST)
Route::post('/proyectos/eliminar', [ProyectoController::class, 'delete']);


