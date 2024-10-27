<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    protected $casts = [
        'punto_recogida' => 'array',
    ];

    protected $fillable = [
        'reserva_id', 
        'punto_recogida',
        'direccion',
        'placeId',
        'latitud',
        'longitud', 
        'costo',
        'distancia',
        'notificacion_enviada'
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
