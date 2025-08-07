@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')
<h2>Crear Proyecto</h2>

@if(session('proyecto_creado'))
<!-- Modal de éxito -->
<div class="modal fade" id="modalExito" tabindex="-1" aria-labelledby="modalExitoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalExitoLabel">Éxito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="text-center mb-2">
          <span class="fs-4">Proyecto creado</span>
        </div>
        <ul class="list-group">
          <li class="list-group-item"><strong>Nombre:</strong> {{ session('proyecto_creado.nombre') }}</li>
          <li class="list-group-item"><strong>Fecha de inicio:</strong> {{ session('proyecto_creado.fecha_inicio') }}</li>
          <li class="list-group-item"><strong>Estado:</strong> {{ session('proyecto_creado.estado') }}</li>
          <li class="list-group-item"><strong>Responsable:</strong> {{ session('proyecto_creado.responsable') }}</li>
          <li class="list-group-item"><strong>Monto:</strong> ${{ number_format(session('proyecto_creado.monto'), 0, ',', '.') }}</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var modal = new bootstrap.Modal(document.getElementById('modalExito'));
  modal.show();
});
</script>
@endif

<form action="{{ url('/proyectos') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado:</label>
        <input type="text" name="estado" id="estado" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="responsable" class="form-label">Responsable:</label>
        <input type="text" name="responsable" id="responsable" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="monto" class="form-label">Monto:</label>
        <input type="number" name="monto" id="monto" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection