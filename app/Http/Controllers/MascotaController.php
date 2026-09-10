<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMascotaRequest;
use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
public function index(Request $request)
{
    $busqueda = $request->input('buscar');
    $orden = $request->input('orden', 'nombre');
    $direccion = $request->input('direccion', 'asc');

    $mascotas = Mascota::when($busqueda, function ($query, $busqueda) {
        return $query->where('nombre', 'like', '%' . $busqueda . '%');
    })->orderBy($orden, $direccion)->get();

    if ($request->ajax()) {
        return view('mascotas._filas', compact('mascotas'));
    }

    return view('mascotas.index', compact('mascotas', 'busqueda', 'orden', 'direccion'));
}
    public function create()
    {
        return view('mascotas.create');
    }

    public function store(StoreMascotaRequest $request)
{
    Mascota::create($request->all());
    return redirect()->route('mascotas.index')->with('success', 'Mascota creada correctamente');
}

    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(StoreMascotaRequest $request, Mascota $mascota)
{
    $mascota->update($request->all());
    return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente');
}

    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente');
    }
}
