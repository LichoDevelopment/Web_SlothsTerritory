<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="registro";
    protected $primaryKey="id";
    protected $fillable = [
        'id_horario', 
        'id_fecha', 
        'cantidad_reservas'
    ];

    public function horario()
    {
        return $this->belongsTo('\App\Models\Horario','id_horario');
    }
    public function fecha_tour()
    {
        return $this->belongsTo('\App\Models\Fecha_tour','id_fecha_tour');
    }
}
