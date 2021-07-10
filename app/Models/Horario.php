<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="horarios";
    protected $primaryKey="id";
    protected $fillable = [
        'hora',
        'capacidad_maxima',
        'hora_minima_reservar'
    ];


    //Relaciones
    public function tours(){
        return $this->hasMany('App\Models\Tour');
    }
    public function resgistros(){
        return $this->hasMany('App\Models\Registro');
    }

//     public function tour()
//     {
//         return $this->belongsTo('\App\Models\Tour');
//     }
}
