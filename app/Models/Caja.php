<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cajas';

    protected $fillable = [
        'fecha_apertura',
        'fecha_cierre',
        'monto_inicial_crc',
        'monto_inicial_usd',
        'observaciones_apertura',
        'observaciones_cierre',
        'estado',
        'created_by',
        'updated_by',
    ];

    // Relación: una caja tiene muchos movimientos
    public function movimientos()
    {
        return $this->hasMany(MovimientoCaja::class, 'id_caja');
    }
}
