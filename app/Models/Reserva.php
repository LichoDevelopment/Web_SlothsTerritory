<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="reservas";
    protected $primaryKey="id";
    protected $fillable = [
        'id_agencia', 
        'id_tour', 
        'id_fecha_tour', 
        'nombre_cliente',
        'cantidad_adultos',
        'cantidad_ninios',
        'cantidad_ninios_gratis',
        'monto_total',
        'descuento',
        'monto_con_descuento',
        'comision_agencia',
        'monto_neto',
        'factura'
    ];


    public function agencia()
    {
        return $this->belongsTo('\App\Models\Agencia','id_agencia');
    }
    public function tour()
    {
        return $this->belongsTo('\App\Models\Tour','id_tour');
    }
    public function fecha_tour()
    {
        return $this->belongsTo('\App\Models\Fecha_tour','id_fecha_tour');
    }
}

