<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{


// Funcion para obtener todos los proyectos y devolver vista web GET
    public function get(Request $request)
    {
        $proyectos = Proyecto::all();

        if ($request->expectsJson()) {
            return response()->json($proyectos, 200);
        }

        return view('obtener_proyectos', compact('proyectos'));
    }


// Funcion para buscar un proyecto por ID y devolver vista web GET ID
    public function buscarProyecto(Request $request)
    {
        $proyecto = null;
        $notFound = false;

        if ($request->has('id')) {
            $proyecto = Proyecto::find($request->input('id'));
            if (!$proyecto) {
                $notFound = true;
            }
        }
        return view('buscar_proyecto', compact('proyecto', 'notFound'));
    }


//Funcion  POST para crear un nuevo proyecto
    public function post(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->input('nombre');
        $proyecto->fecha_inicio = $request->input('fecha_inicio');
        $proyecto->estado = $request->input('estado');
        $proyecto->responsable = $request->input('responsable');
        $proyecto->monto = $request->input('monto');
        $proyecto->save();

        return redirect()->back()->with('proyecto_creado', $proyecto);
    }


// Funciones para gestionar el PATCH de actualizacion del proyecto
    // A --> funcion para buscar un proyecto por ID y mostrar resultado en vista
    public function buscarEditar(Request $request)
    {
        $proyecto = null;
        $notFound = false;

        if ($request->has('id')) {
            $proyecto = Proyecto::find($request->input('id'));
            if (!$proyecto) {
                $notFound = true;
            }
        }
        return view('buscar_editar', compact('proyecto', 'notFound'));
    }

    // B --> Funcion para Ejecutar el PATCH de actualización del proyecto y devolver vista web
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
        $proyecto->nombre = $request->input('nombre', $proyecto->nombre);
        $proyecto->fecha_inicio = $request->input('fecha_inicio', $proyecto->fecha_inicio);
        $proyecto->estado = $request->input('estado', $proyecto->estado);
        $proyecto->responsable = $request->input('responsable', $proyecto->responsable);
        $proyecto->monto = $request->input('monto', $proyecto->monto);
        $proyecto->save();

        return redirect('/proyectos')->with('success', 'Proyecto actualizado correctamente');
    }

    // C --> Funcion para editar un proyecto existente recibiendo directamente la ID en la ruta WEB (sin uso)
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return redirect('/proyectos/editar')->with('error', 'Proyecto no encontrado');
        }
        return view('editar_proyecto', compact('proyecto'));
    }


//METODO DELETE POR ID CON JSON
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return redirect()->back()->with('error', 'Proyecto no encontrado');
        }
        $proyecto->delete();
        return redirect()->back()->with('success', 'Proyecto eliminado');
    }



}