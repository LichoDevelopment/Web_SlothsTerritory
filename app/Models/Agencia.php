<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="agencias";
    protected $primaryKey="id";
    protected $fillable = [
        'nombre',
        'comision'
    ];

    //Relaciones
    public function reservas(){
        return $this->hasMany('App\Models\Reserva','id_agencia');
    }

}
