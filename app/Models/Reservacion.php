<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_cliente',
        'adultos',
        'niños',
        'niños_gratis',
        'precio',
        'precio_con_descuento',
        'factura',
        'fecha_inicio',
        'agencia_id',
        'tour_id',
        'horario_id'
    ];

    public function tour()
    {
        return $this->belongsTo('\App\Models\Tour');
    }
    public function agencia()
    {
        return $this->belongsTo('\App\Models\Agencia','agencia_id');
    }
    public function horario()
    {
        return $this->belongsTo('\App\Models\Horario','horario_id');
    }
}
