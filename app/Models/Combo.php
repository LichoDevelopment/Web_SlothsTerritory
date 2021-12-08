<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'adult_price',
        'kid_price',
        'itinerary',
        'includes',
        'requirements',
        'image',
        'uuid',
        'language',
    ];
}
