<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoControllerApi extends Controller
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


        //----------------------------------------
    // MÉTODO PARA OBTENER TODOS LOS PROYECTOS (GET)
    //----------------------------------------
    public function get()
    {
        $proyectos = Proyecto::all();
        return response()->json($proyectos, 200);
    }


    //----------------------------------------
    // MÉTODO PARA OBTENER UN PROYECTO POR ID (GET)
    //----------------------------------------
    public function getById($id)
    {
        $proyecto = Proyecto::find($id);
        if ($proyecto) {
            return response()->json($proyecto, 200);
        } else {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
    }

    //----------------------------------------
// MÉTODO PARA CREAR UN NUEVO PROYECTO (POST) Y DEVOLVER EL JSON DEL PROYECTO CREADO
//----------------------------------------
    public function post(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string|max:50',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        // Crear el nuevo proyecto en la base de datos
        $proyecto = Proyecto::create($validatedData);

        // Devolver el proyecto recién creado en formato JSON
        return response()->json($proyecto, 201);
    }
//----------------------------------------

    //----------------------------------------
    // MÉTODO PARA ACTUALIZAR UN PROYECTO (PATCH)
    //----------------------------------------
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'fecha_inicio' => 'sometimes|required|date',
            'estado' => 'sometimes|required|string|max:50',
            'responsable' => 'sometimes|required|string|max:255',
            'monto' => 'sometimes|required|numeric|min:0',
        ]);

        // Actualizar los campos del proyecto
        $proyecto->update($validatedData);

        // Devolver el proyecto actualizado
        return response()->json($proyecto, 200);
    }

    //----------------------------------------
    // MÉTODO PARA ELIMINAR UN PROYECTO (DELETE)
    //----------------------------------------
    public function delete($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
        $proyecto->delete();
        return response()->json(['message' => 'Proyecto eliminado correctamente'], 200);
    }
}