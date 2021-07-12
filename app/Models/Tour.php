<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="tours";
    protected $primaryKey="id";
    protected $fillable = [
        'id_horario',
        'id_precio',
        'nombre'
    ];

    // Relaciones
    public function reservas(){
        return $this->hasMany('App\Models\Reserva');
    }
    //


    public function horarios(){
        return $this->hasMany('App\Models\Horario');
    }

    public function tours(){
        return $this->hasMany('App\Models\Tour');
    }
}
