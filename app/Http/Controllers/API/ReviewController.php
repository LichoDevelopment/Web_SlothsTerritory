<?php

namespace App\Http\Controllers\API;;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(){
        return Review::take(5)->where('rate', '>=', 4)->orderBy('created_at', 'desc')->get();
    }

    public function create(Request $request){
        try {
            Review::create([
                'text' => $request->text,
                'reviewer' => $request->reviewer,
                'rate' => $request->rate,
            ]);
    
            return response([
                'message' => 'Review Created',
                'error' => false
            ], 201);
        } catch (\Throwable $th) {
            return response([
                'message' => $th->getMessage(),
                'error' => true
            ], 500);
        }
    }
}
