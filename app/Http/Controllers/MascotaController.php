<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
    public function index(Request $request)
{
    $busqueda = $request->input('buscar');

    $mascotas = Mascota::when($busqueda, function ($query, $busqueda) {
        return $query->where('nombre', 'like', '%' . $busqueda . '%');
    })->get();

    if ($request->ajax()) {
        return view('mascotas._filas', compact('mascotas'));
    }

    return view('mascotas.index', compact('mascotas', 'busqueda'));
}

    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'especie' => 'required|string|max:50',
            'edad' => 'required|integer|min:0',
        ]);

        Mascota::create($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Mascota creada correctamente');
    }

    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
    'nombre' => 'required|string|max:100|regex:/^[a-zA-ZÀ-ÿñÑ\s]+$/',
    'especie' => 'required|string|max:50|regex:/^[a-zA-ZÀ-ÿñÑ\s]+$/',
    'raza' => 'nullable|string|max:50|regex:/^[a-zA-ZÀ-ÿñÑ\s]*$/',
    'sexo' => 'required|in:Masculino,Femenino,Ambos',
    'edad' => 'required|integer|min:0|max:40',
], [
    'nombre.regex' => 'El nombre solo puede contener letras.',
    'especie.regex' => 'La especie solo puede contener letras.',
    'raza.regex' => 'La raza solo puede contener letras.',
]);

        $mascota->update($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente');
    }

    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente');
    }
}
