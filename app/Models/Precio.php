<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="precios";
    protected $primaryKey="id";
    protected $fillable = [
        'precio_adulto',
        'precio_niño'
    ];

    //Relaciones
    public function reservas(){
        return $this->hasMany('App\Models\Reserva');
    }
    
    public function tour()
    {
        return $this->belongsTo('\App\Models\Tour','id_tour');
    }
}
