<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
        'nombre_cliente',
        'tipo_equipo',
        'marca',
        'falla',
        'estado'
    ];
}
