<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservas';

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
        'id_agencia',
        'id_tour',
        'id_horario',
    ];

    public function tour()
    {
        return $this->belongsTo('\App\Models\Tour');
    }
    public function agencia()
    {
        return $this->belongsTo('\App\Models\Agencia','id_agencia');
    }
    public function horario()
    {
        return $this->belongsTo('\App\Models\Horario','id_horario');
    }
}
