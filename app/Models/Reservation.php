<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name',
        'adults',
        'kids',
        'kids_free',
        'price',
        'price_with_discount',
        'start_date',
        'agency_id',
        'tour_id'
    ];

    public function tour()
    {
        return $this->belongsTo('\App\Models\Tour');
    }
    public function agency()
    {
        return $this->belongsTo('\App\Models\Agency');
    }
}
