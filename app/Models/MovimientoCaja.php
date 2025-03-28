<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimientoCaja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movimientos_caja';

    protected $fillable = [
        'id_caja',
        'tipo_movimiento',
        'efectivo_crc',
        'efectivo_usd',
        'tarjeta_crc',
        'tarjeta_usd',
        'transferencia_crc',
        'transferencia_usd',
        'motivo',
        'descripcion',
        'fecha_movimiento',
        'id_pago',
        'retirado_por',
        'created_by',
        'updated_by',
    ];

    public function caja()
    {
        return $this->belongsTo(Caja::class, 'id_caja');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}
