<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenCarusel extends Model
{
    use HasFactory;
    
    protected $table = 'imagenes_carusel';

    protected $fillable = ['titulo', 'url'];
}
