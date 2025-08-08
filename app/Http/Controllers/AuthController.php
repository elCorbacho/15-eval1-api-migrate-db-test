<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    // Funcion para registrar un nuevo usuario y devolver el token JWT
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(['user' => $user, 'token' => $token], 201);
    }


    
    // Funcion para iniciar sesión y devolver el token JWT
    /* public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        return response()->json(['token' => $token]);
    }*/


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            // Si espera JSON (API/Postman)
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Credenciales inválidas'], 401);
            }
            // Si es desde web
            return back()->with('error', 'Credenciales inválidas');
        }

        // Si espera JSON (API/Postman)
        if ($request->expectsJson()) {
            return response()->json(['token' => $token]);
        }

        // Si es desde web
        return redirect()->back()->with('success', 'Login exitoso. Token: ' . $token);
    }
    

    /*// Funcion para obtener el perfil del usuario autenticado
    public function perfil()
    {
        return response()->json(auth()->user());
    }

    // Funcion para cerrar sesión y eliminar el token JWT
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Sesión cerrada']);
    }*/
}
