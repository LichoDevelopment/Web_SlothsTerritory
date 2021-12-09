<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensajes_web extends Model
{
    use HasFactory, SoftDeletes;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table="mensajes_web";
    protected $primaryKey="id";
    protected $fillable = [
        'nombre',
        'correo',
        'mensaje'
    ];
}
