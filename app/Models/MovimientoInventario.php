<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimientoInventario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movimientos_inventario';

    protected $fillable = [
        'id_producto',
        'tipo_movimiento',
        'cantidad',
        'costo_unitario',
        'precio_venta_unitario',
        'motivo',
        'fecha_movimiento',
        'id_pago',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'fecha_movimiento' => 'datetime',
    ];

    // Relación: un movimiento pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    // Relación: un movimiento puede pertenecer a un pago (opcional)
    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }
}
