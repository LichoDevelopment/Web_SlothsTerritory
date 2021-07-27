<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="reservas";
    protected $primaryKey="id";
    protected $fillable = [
        'nombre_cliente',
        'cantidad_adultos',
        'cantidad_niños',
        'cantidad_niños_gratis',
        'monto_total',
        'descuento',
        'monto_con_descuento',
        'comision_agencia',
        'monto_neto',
        'id_agencia',
        'id_tour',
        'id_horario',
        // 'id_precio',
        'id_fecha_tour',
        'factura',
        'id_estado',
        'deleted_at'
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
    public function horario()
    {
        return $this->belongsTo('\App\Models\Horario','id_horario');
    }
    // public function precio()
    // {
    //     return $this->belongsTo('\App\Models\Precio','id_precio');
    // }
    public function estado()
    {
        return $this->belongsTo('\App\Models\Estado','id_estado');
    }
}

