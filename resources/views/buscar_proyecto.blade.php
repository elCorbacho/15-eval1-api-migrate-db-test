@extends('layouts.app')

@section('title', 'Buscar Proyecto por ID')

@section('content')
<h2>Buscar Proyecto por ID</h2>
<form action="{{ url('/proyecto/buscar') }}" method="GET">
    <div class="mb-3">
        <label for="id" class="form-label">ID del proyecto:</label>
        <input type="number" name="id" id="id" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

@if(isset($proyecto))
    <hr>
    <h3>Datos del Proyecto</h3>
    <ul>
        <li><strong>ID:</strong> {{ $proyecto['id'] }}</li>
        <li><strong>Nombre:</strong> {{ $proyecto['nombre'] }}</li>
        <li><strong>Fecha de inicio:</strong> {{ $proyecto['fecha_inicio'] }}</li>
        <li><strong>Estado:</strong> {{ $proyecto['estado'] }}</li>
        <li><strong>Responsable:</strong> {{ $proyecto['responsable'] }}</li>
        <li><strong>Monto:</strong> {{ $proyecto['monto'] }}</li>
    </ul>
@elseif(request()->has('id') && isset($notFound))
    <div class="alert alert-danger">Proyecto no encontrado.</div>
@endif
@endsection
