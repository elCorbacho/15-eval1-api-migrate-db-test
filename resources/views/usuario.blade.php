@extends('layouts.app')

@section('title', 'Nuevo Usuario')

@section('content')

<h2>Datos del usuario</h2>
<p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
<p><strong>Email:</strong> {{ $usuario->email }}</p>
<p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>

@endsection
