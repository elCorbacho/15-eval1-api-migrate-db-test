<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
        public function proyecto($id, $nombre, $fecha_inicio, $estado, $responsable, $monto)
    {
        $proyecto = new Proyecto();
        $proyecto->id = $id;
        $proyecto->nombre = $nombre;
        $proyecto->fecha_inicio = $fecha_inicio;
        $proyecto->estado = $estado;
        $proyecto->responsable = $responsable;
        $proyecto->monto = $monto;
        dd($proyecto);
    }



//----------------------------------------OK
//CONTROLADOR PARA CREAR PROYECTO CON POST EN JSON
//----------------------------------------
    public function post(Request $request)
    {
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Calcular el nuevo id
        $nuevoId = empty($proyectos) ? 1 : collect($proyectos)->max('id') + 1;

        // Genera el proyecto con los datos recibidos
        $proyecto = [
            'id' => $nuevoId,
            'nombre' => $request->input('nombre'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'estado' => $request->input('estado'),
            'responsable' => $request->input('responsable'),
            'monto' => $request->input('monto')
        ];

        // Agregar el nuevo proyecto al array
        $proyectos[] = $proyecto;

        // Guardar el array actualizado en el archivo JSON
        file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Redirigir de vuelta al formulario con los datos del proyecto creado para el modal
        return redirect()->back()->with('proyecto_creado', $proyecto);
    }
//----------------------------------------



public function get(Request $request)
{
    $ruta = base_path('database/proyectos.json');
    $proyectos = [];

    if (file_exists($ruta)) {
        $json = file_get_contents($ruta);
        $proyectos = json_decode($json, true);
    }

    // Si la solicitud espera JSON, devolver JSON
    if ($request->expectsJson()) {
        return response()->json($proyectos, 200);
    }

    // Si no, devolver la vista
    return view('obtener_proyectos', compact('proyectos'));
}





//----------------------------------------OK
//CONTROLADOR PARA ACTUALIZAR PROYECTO CON PATCH EN JSON
//----------------------------------------
    public function update(Request $request, $id)
{
    $ruta = base_path('database/proyectos.json');
    $proyectos = [];

    if (file_exists($ruta)) {
        $json = file_get_contents($ruta);
        $proyectos = json_decode($json, true);
    }
    $index = array_search((int)$id, array_column($proyectos, 'id'));
    if ($index === false) {
        return response()->json(['error' => 'Proyecto no encontrado'], 404);
    }
    $proyectos[$index]['nombre'] = $request->input('nombre', $proyectos[$index]['nombre']);
    $proyectos[$index]['fecha_inicio'] = $request->input('fecha_inicio', $proyectos[$index]['fecha_inicio']);
    $proyectos[$index]['estado'] = $request->input('estado', $proyectos[$index]['estado']);
    $proyectos[$index]['responsable'] = $request->input('responsable', $proyectos[$index]['responsable']);
    $proyectos[$index]['monto'] = $request->input('monto', $proyectos[$index]['monto']);

    file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    return redirect('/proyectos')->with('success', 'Proyecto actualizado correctamente');
}
//----------------------------------------OK
// FUNCION PARA EDITAR UN PROYECTO EXISTENTE y MOSTRAR VISTA DESDE JSON
// ----------------------------------------
    public function edit($id)
{
    $ruta = base_path('database/proyectos.json');
    $proyectos = [];

    if (file_exists($ruta)) {
        $json = file_get_contents($ruta);
        $proyectos = json_decode($json, true);
    }

    $proyecto = collect($proyectos)->firstWhere('id', (int)$id);

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
                $ruta = base_path('database/proyectos.json');
                $proyectos = [];
                if (file_exists($ruta)) {
                    $json = file_get_contents($ruta);
                    $proyectos = json_decode($json, true);
                }
                $proyecto = collect($proyectos)->first(function ($item) use ($request) {
                    return (int)$item['id'] === (int)$request->input('id');
                });
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
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        $index = array_search($id, array_column($proyectos, 'id'));

        if ($index === false) {
            return redirect()->back()->with('error', 'Proyecto no encontrado');
        }

        array_splice($proyectos, $index, 1);

        file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()->back()->with('success', 'Proyecto eliminado');
    }
//----------------------------------------



//----------------------------------------
//METODO GET POR ID CON JSON
//----------------------------------------
    public function show($id)
    {
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Buscar el proyecto por id
        $proyecto = collect($proyectos)->firstWhere('id', (int)$id);

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
            $ruta = base_path('database/proyectos.json');
            $proyectos = [];
            if (file_exists($ruta)) {
                $json = file_get_contents($ruta);
                $proyectos = json_decode($json, true);
            }
            $proyecto = collect($proyectos)->firstWhere('id', (int)$request->input('id'));
            if (!$proyecto) {
                $notFound = true;
            }
        }
        return view('buscar_proyecto', compact('proyecto', 'notFound'));
    }
//----------------------------------------

}