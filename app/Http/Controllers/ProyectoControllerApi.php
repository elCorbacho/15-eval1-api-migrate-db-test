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
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Devolver todos los proyectos en formato JSON
        return response()->json($proyectos, 200);
    }


    //----------------------------------------
    // MÉTODO PARA OBTENER UN PROYECTO POR ID (GET)
    //----------------------------------------
    public function getById($id)
    {
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Buscar el proyecto por ID
        $proyecto = collect($proyectos)->firstWhere('id', (int)$id);

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
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string|max:50',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        // Leer el archivo JSON si existe
        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Calcular el nuevo ID
        $nuevoId = empty($proyectos) ? 1 : collect($proyectos)->max('id') + 1;

        // Crear el nuevo proyecto con los datos validados
        $proyecto = [
            'id' => $nuevoId,
            'nombre' => $validatedData['nombre'],
            'fecha_inicio' => $validatedData['fecha_inicio'],
            'estado' => $validatedData['estado'],
            'responsable' => $validatedData['responsable'],
            'monto' => $validatedData['monto'],
        ];

        // Agregar el nuevo proyecto al array
        $proyectos[] = $proyecto;

        // Guardar el array actualizado en el archivo JSON
        file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Devolver solo el proyecto recién creado en formato JSON
        return response()->json($proyecto, 201);
    }
//----------------------------------------

    //----------------------------------------
    // MÉTODO PARA ACTUALIZAR UN PROYECTO (PATCH)
    //----------------------------------------
    public function update(Request $request, $id)
    {
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Buscar el proyecto por ID
        $index = collect($proyectos)->search(function ($proyecto) use ($id) {
            return $proyecto['id'] == (int)$id;
        });

        if ($index === false) {
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
        foreach ($validatedData as $key => $value) {
            $proyectos[$index][$key] = $value;
        }

        // Guardar el array actualizado en el archivo JSON
        file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Devolver el proyecto actualizado
        return response()->json($proyectos[$index], 200);
    }

    //----------------------------------------
    // MÉTODO PARA ELIMINAR UN PROYECTO (DELETE)
    //----------------------------------------
    public function delete($id)
    {
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Buscar el proyecto por ID
        $index = collect($proyectos)->search(function ($proyecto) use ($id) {
            return $proyecto['id'] == (int)$id;
        });

        if ($index === false) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }

        // Eliminar el proyecto del array
        array_splice($proyectos, $index, 1);

        // Guardar el array actualizado en el archivo JSON
        file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Devolver una respuesta exitosa
        return response()->json(['message' => 'Proyecto eliminado correctamente'], 200);
    }
}