@extends('layouts.app')

@section('title', 'Eliminar Proyecto')

@section('content')
<h2>Eliminar Proyecto</h2>


@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ url('/proyectos/eliminar') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="id" class="form-label">ID del proyecto a eliminar:</label>
        <input type="number" name="id" id="id" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-danger">Eliminar</button>
</form>
@endsection
