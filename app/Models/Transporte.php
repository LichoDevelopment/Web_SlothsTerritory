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
        'notificacion_enviada',
        'created_by',
        'updated_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
