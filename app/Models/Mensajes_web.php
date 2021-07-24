<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajes_web extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="mensajes_web";
    protected $primaryKey="id";
    protected $fillable = [
        'nombre',
        'correo',
        'mensaje'
    ];
}
