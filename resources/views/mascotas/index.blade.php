@extends('layouts.app')

@section('content')
<h2>Mascotas</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('mascotas.create') }}" class="btn btn-primary mb-3">Nueva Mascota</a>

<div class="mb-3">
    <input type="text" id="buscador" class="form-control" placeholder="Buscar por nombre..." value="{{ $busqueda }}">
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>
            <a href="{{ route('mascotas.index', ['orden' => 'nombre', 'direccion' => $direccion == 'asc' ? 'desc' : 'asc', 'buscar' => $busqueda]) }}" class="text-dark text-decoration-none">
                Nombre {{ $orden == 'nombre' ? ($direccion == 'asc' ? '↑' : '↓') : '' }}
            </a>
        </th>
        <th>Especie</th>
        <th>Sexo</th>
        <th>Raza</th>
        <th>
            <a href="{{ route('mascotas.index', ['orden' => 'edad', 'direccion' => $direccion == 'asc' ? 'desc' : 'asc', 'buscar' => $busqueda]) }}" class="text-dark text-decoration-none">
                Edad {{ $orden == 'edad' ? ($direccion == 'asc' ? '↑' : '↓') : '' }}
            </a>
        </th>
        <th>Dueño</th>
        <th>Acciones</th>
    </tr>
</thead>
    <tbody id="tabla-mascotas">
        @include('mascotas._filas')
    </tbody>
</table>

<script>
const input = document.getElementById('buscador');
let timer;

input.addEventListener('input', function () {
    clearTimeout(timer);
    timer = setTimeout(() => {
        fetch(`{{ route('mascotas.index') }}?buscar=${encodeURIComponent(input.value)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('tabla-mascotas').innerHTML = html;
        });
    }, 300); // espera 300ms después de dejar de tipear, para no mandar un pedido por cada letra
});
</script>
@endsection