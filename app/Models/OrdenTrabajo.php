<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_ingreso',
        'fecha_ingreso',
        'patente',
        'kilometraje',
        'observaciones'
    ];
}
