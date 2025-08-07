@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')

<h2>Lista de proyectos</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha de inicio</th>
            <th>Estado</th>
            <th>Responsable</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proyectos as $proyecto)
        <tr>
            <td>{{ $proyecto['id'] }}</td>
            <td>{{ $proyecto['nombre'] }}</td>
            <td>{{ $proyecto['fecha_inicio'] }}</td>
            <td>{{ $proyecto['estado'] }}</td>
            <td>{{ $proyecto['responsable'] }}</td>
            <td>{{ $proyecto['monto'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection