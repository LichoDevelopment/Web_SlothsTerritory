<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo_barras',
        'precio_venta',
        'stock_actual',
        'activo',
        'created_by',
        'updated_by',
    ];

    // Relación: un producto tiene muchos movimientos de inventario
    public function movimientosInventario()
    {
        return $this->hasMany(MovimientoInventario::class, 'id_producto');
    }
}
