<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $fillable = ['nombre', 'especie', 'raza', 'edad', 'nombre_dueño', 'telefono_dueño'];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}