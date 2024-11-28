<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'costo_id',
        'categoria_id',
        'tema',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'publicado',
        'user_id'
    ];
}
