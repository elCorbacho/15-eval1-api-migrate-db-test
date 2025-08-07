@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<h2>Editar Proyecto</h2>
<form action="{{ url('/proyectos/editar/' . $proyecto['id']) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $proyecto['nombre'] }}" required>
    </div>
    <div class="mb-3">
        <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $proyecto['fecha_inicio'] }}" required>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado:</label>
        <input type="text" name="estado" id="estado" class="form-control" value="{{ $proyecto['estado'] }}" required>
    </div>
    <div class="mb-3">
        <label for="responsable" class="form-label">Responsable:</label>
        <input type="text" name="responsable" id="responsable" class="form-control" value="{{ $proyecto['responsable'] }}" required>
    </div>
    <div class="mb-3">
        <label for="monto" class="form-label">Monto:</label>
        <input type="number" name="monto" id="monto" class="form-control" value="{{ $proyecto['monto'] }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection