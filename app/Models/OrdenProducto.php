<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_orden',
        'producto_id',
        'cantidad',
        'precio',
        'precio_total'
    ];
}
