<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMascotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100|regex:/^[a-zA-ZÀ-ÿñÑ\s]+$/',
            'especie' => 'required|string|max:50|regex:/^[a-zA-ZÀ-ÿñÑ\s]+$/',
            'raza' => 'nullable|string|max:50|regex:/^[a-zA-ZÀ-ÿñÑ\s]*$/',
            'sexo' => 'required|in:Masculino,Femenino,Ambos',
            'edad' => 'required|integer|min:0|max:30',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.regex' => 'El nombre solo puede contener letras.',
            'especie.regex' => 'La especie solo puede contener letras.',
            'raza.regex' => 'La raza solo puede contener letras.',
        ];
    }
}