<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha_tour extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="fecha_tour";
    protected $primaryKey="id";
    protected $fillable = [
        'fecha'
    ];

    //Relaciones
    public function reservas(){
        return $this->hasMany('App\Models\Reserva');
    }
    public function resgistros(){
        return $this->hasMany('App\Models\Registro');
    }
}
