<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
    * @var Request
    */
   private $request;

   private $validationRules = [
       'client_name'            => 'required',
       'adults'                 => 'required',
       'kids'                   => 'required',
       'kids_free'              => 'required',
       'price'                  => 'required',
       'start_date'             => 'required',
       'agency_id'              => 'required',
       'tour_id'                => 'required',
    ];

   public function __construct(Request $request) {
       $this->request = $request;
   }

   public function store()
   {
       $response = response("",201);

       $validator = Validator::make($this->request->all(), $this->validationRules);

       if($validator->fails()){
           $response = response([
               "status"    => 422,
               "message"   => "Error",
               "errors"    => $validator->errors()
           ], 422);
       }else{
           Reservation::create([
               'client_name'            => $this->request->client_name,
               'adults'                 => $this->request->adults,
               'kids'                   => $this->request->kids,
               'kids_free'              => $this->request->kids_free,
               'price'                  => $this->request->price,
               'price_with_discount'    => $this->request->price,
               'start_date'             => $this->request->start_date,
               'agency_id'              => $this->request->agency_id,
               'tour_id'                => $this->request->tour_id,
           ]);
       }

       return $response;
   }

   public function update($id)
   {
       $response = response("",202);

       $validator = Validator::make($this->request->all(), $this->validationRule);

       if($validator->fails()){
           $response = response([
               "status"    => 422,
               "message"   => "Error",
               "errors"    => $validator->errors()
           ], 422);
       }else{
           Reservation::fin($id)->update([
               'client_name'            => $this->request->client_name,
               'adults'                 => $this->request->adults,
               'kids'                   => $this->request->kids,
               'kids_free'              => $this->request->kids_free,
               'price'                  => $this->request->price,
               'price_with_discount'    => $this->request->price,
               'start_date'             => $this->request->start_date,
               'agency_id'              => $this->request->agency_id,
               'tour_id'                => $this->request->tour_id,
            ]);
       }

       return $response;
   }

   public function destroy($id)
   {
       Reservation::destroy($id);
       return response("", 204);
   }
}
