<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionTransporte extends Model
{
    use HasFactory;

    protected $table = 'configuraciones_transporte';

    protected $fillable = [
        'precio_minimo',
        'distancia_maxima',
        'distancia_minima',
        'precio_por_km_adicional',
        'cantidad_maxima_pasajeros'
    ];
}
