<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tour;

class TourController extends Controller
{
    public function info()
    {
        return Tour::with(['horarios' => function($q){
            $q->orderBy('orden');
        }, 'precios' => function($q){
            $q->where('id_agencia',  3);
        }])->whereIn('id', [1,2,3])->get()->toArray();

        
    }
}
