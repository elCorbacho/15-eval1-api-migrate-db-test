@extends('layouts.app')

@section('title', 'register')

@section('content')

<h2>Registro de Usuario</h2>
<form id="registerForm" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>

<!-- Modal Bootstrap -->
<div class="modal fade" id="tokenModal" tabindex="-1" aria-labelledby="tokenModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tokenModalLabel">Su token es: </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="tokenModalBody">
        <!-- Aquí se mostrará el token -->
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('registerForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    const response = await fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
            'Accept': 'application/json'
        },
        body: formData
    });

    const data = await response.json();

    if (data.token) {
        document.getElementById('tokenModalBody').textContent = data.token;
        var modal = new bootstrap.Modal(document.getElementById('tokenModal'));
        modal.show();
        form.reset();
    } else if (data.errors) {
        alert(Object.values(data.errors).join('\n'));
    } else {
        alert('Error al registrar');
    }
});
</script>
@endpush