<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;




class RutaController extends Controller
{
    public function get()
    {
        // Logic for the 'get' method
        #return "estoy en get";
        dd("Estoy en get");
        ##dd("estoy en get2");
    }


    public function usuario($nombre, $email, $telefono)
    {
        // Logic for the 'usuario' method
        ##dd($nombre);
        #return "Nombre: $nombre, Email: $email, Telefono: $telefono";
        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->email = $email;
        $usuario->telefono = $telefono;
        #$usuario->save();
        dd($usuario);
    }

        public function nuevo($nombre, $email, $telefono)
    {
        // Logic for the 'usuario' method
        ##dd($nombre);
        #return "Nombre: $nombre, Email: $email, Telefono: $telefono";
        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->email = $email;
        $usuario->telefono = $telefono;
        #$usuario->save();
        //dd($usuario);
        return view('usuario', compact('usuario'));
    }

    public function proyecto($id, $nombre, $fecha_inicio, $estado, $responsable, $monto)
    {
        // Logic for the 'proyecto' method
        ##dd($nombre);
        #return "Nombre: $nombre, Email: $email, Telefono: $telefono";
        $proyecto = new Proyecto();
        $proyecto->id = $id;
        $proyecto->nombre = $nombre;
        $proyecto->fecha_inicio = $fecha_inicio;
        $proyecto->estado = $estado;
        $proyecto->responsable = $responsable;
        $proyecto->monto = $monto;
        #$proyecto->save();
        dd($proyecto);
    }



    public function post(Request $request)
    {
        // Logic for the 'post' method
        dd("Estoy en post");
    }
}
