<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    // Método innecesario eliminado para evitar conflicto de nombres



//----------------------------------------OK
//CONTROLADOR PARA CREAR PROYECTO CON POST EN JSON
//----------------------------------------
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
//----------------------------------------



public function get(Request $request)
{
    $proyectos = Proyecto::all();

    if ($request->expectsJson()) {
        return response()->json($proyectos, 200);
    }

    return view('obtener_proyectos', compact('proyectos'));
}





//----------------------------------------OK
//CONTROLADOR PARA ACTUALIZAR PROYECTO CON PATCH EN JSON
//----------------------------------------
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
//----------------------------------------OK
// FUNCION PARA EDITAR UN PROYECTO EXISTENTE y MOSTRAR VISTA DESDE JSON
// ----------------------------------------
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return redirect('/proyectos/editar')->with('error', 'Proyecto no encontrado');
        }
        return view('editar_proyecto', compact('proyecto'));
    }
//----------------------------------------OK
// ----------------------------------------OK
// FUNCION PARA BUSCAR UN PROYECTO POR ID y MOSTRAR VISTA DESDE JSON
// ----------------------------------------
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
//----------------------------------------



//----------------------------------------OK
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
//----------------------------------------



//----------------------------------------
//METODO GET POR ID CON JSON
//----------------------------------------
    public function show($id)
    {
        $proyecto = Proyecto::find($id);
        if ($proyecto) {
            return response()->json($proyecto, 200);
        } else {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
    }
//----------------------------------------




// ----------------------------------------OKOKOK
// MÉTODO PARA BUSCAR UN PROYECTO POR ID y MOSTRAR VISTA DESDE JSON
// ----------------------------------------
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
//----------------------------------------

}