<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Http\JsonResponse;

class ProyectoControllerApi extends Controller
{

// Funcion API para obtener todos los proyectos (GET)
    public function get(): JsonResponse
    {
        $proyectos = Proyecto::all();
        return response()->json($proyectos, 200);
    }


// Funcion API para obtener proyecto por ID (GET)
    public function getById($id): JsonResponse
    {
        $proyecto = Proyecto::find($id);
        if ($proyecto) {
            return response()->json($proyecto, 200);
        } else {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
    }


// Funcion API para crear un nuevo proyecto (POST) y devolver el JSON del proyecto creado
    public function post(Request $request): JsonResponse
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


// Funcion API para actualizar un proyecto (PATCH)
    public function update(Request $request, $id): JsonResponse
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


// Funcion API para eliminar un proyecto (DELETE)
    public function delete($id): JsonResponse
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
        $proyecto->delete();
        return response()->json(['message' => 'Proyecto eliminado correctamente'], 200);
    }
}