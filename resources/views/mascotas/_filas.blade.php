@forelse($mascotas as $mascota)
<tr>
    <td>{{ $mascota->nombre }}</td>
    <td>{{ $mascota->especie }}</td>
    <td>{{ $mascota->sexo }}</td>
    <td>{{ $mascota->raza }}</td>
    <td>{{ $mascota->edad }}</td>
    <td>{{ $mascota->nombre_dueño }}</td>
    <td>
        <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-sm btn-warning">Editar</a>
        <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar mascota?')">Eliminar</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="7" class="text-center">No se encontraron mascotas</td>
</tr>
@endforelse