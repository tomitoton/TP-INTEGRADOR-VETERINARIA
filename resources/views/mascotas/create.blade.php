@extends('layouts.app')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Nueva Mascota</h2>

<form action="{{ route('mascotas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" pattern="[A-Za-zÀ-ÿñÑ\s]+" title="Solo letras">
    <div class="mb-3">
        <label class="form-label">Especie</label>
        <input type="text" name="especie" class="form-control" value="{{ old('especie') }}">
    </div>
    <div class="mb-3">
    <label class="form-label">Sexo</label>
    <select name="sexo" class="form-control">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="Ambos">Ambos</option>
    </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Raza</label>
        <input type="text" name="raza" class="form-control" value="{{ old('raza') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Edad</label>
        <input type="number" name="edad" class="form-control" value="{{ old('edad') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre del dueño</label>
        <input type="text" name="nombre_dueño" class="form-control" value="{{ old('nombre_dueño') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono del dueño</label>
        <input type="text" name="telefono_dueño" class="form-control" value="{{ old('telefono_dueño') }}">
    </div>
    <button class="btn btn-primary">Guardar</button>
</form>
@endsection