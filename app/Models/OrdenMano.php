<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenMano extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_orden',
        'mano_id',
        'costo'
    ];
}
