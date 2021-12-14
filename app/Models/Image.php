<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'titulo', 'tipo'];

    protected $table = 'galeria';


    public function type()
    {
        return $this->belongsTo('App\Models\ImageType', 'tipo', 'id');
    }
}
