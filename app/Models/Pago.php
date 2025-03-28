<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pagos';

    protected $fillable = [
        'id_reserva',
        'fecha_pago',
        'efectivo_crc',
        'efectivo_usd',
        'tarjeta_crc',
        'tarjeta_usd',
        'transferencia_crc',
        'transferencia_usd',
        'tipo_concepto',
        'observaciones',
        'created_by',
        'updated_by',
    ];

    // Relación: un pago puede estar vinculado a varios movimientos de inventario (si aplica)
    public function movimientosInventario()
    {
        return $this->hasMany(MovimientoInventario::class, 'id_pago');
    }

    // (Opcional) Relación con reserva (muchos sueldan 1..1, pero si en tu caso es 1..n, adáptalo)
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}
