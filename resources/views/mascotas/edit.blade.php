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
<h2>Editar Mascota</h2>

<form action="{{ route('mascotas.update', $mascota) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $mascota->nombre }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Especie</label>
        <input type="text" name="especie" class="form-control" value="{{ $mascota->especie }}">
    </div>

    <div class="mb-3">
    <label class="form-label">Sexo</label>
    <select name="sexo" class="form-control">
        <option value="Masculino" {{ $mascota->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
        <option value="Femenino" {{ $mascota->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        <option value="Ambos" {{ $mascota->sexo == 'Ambos' ? 'selected' : '' }}>Ambos</option>
    </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Raza</label>
        <input type="text" name="raza" class="form-control" value="{{ $mascota->raza }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Edad</label>
        <input type="number" name="edad" class="form-control" value="{{ $mascota->edad }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre del dueño</label>
        <input type="text" name="nombre_dueño" class="form-control" value="{{ $mascota->nombre_dueño }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono del dueño</label>
        <input type="text" name="telefono_dueño" class="form-control" value="{{ $mascota->telefono_dueño }}">
    </div>
    <button class="btn btn-primary">Guardar</button>
</form>
@endsection