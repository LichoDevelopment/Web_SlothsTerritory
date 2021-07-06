<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgencyController extends Controller
{
    /**  
     * @var Request
     */
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }


    public function store()
    {
        $response = response("",201);

        $validator = Validator::make($this->request->all(), [
            'name'          => 'required',
            'commission'    => 'required',
            'invoice'       => 'required'
        ]);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Agency::create([
                'name'          => $this->request->name,
                'commission'    => $this->request->commission,
                'invoice'       => $this->request->invoice
            ]);
        }

        return $response;
    }

    public function update($id)
    {
        $response = response("",202);

        $validator = Validator::make($this->request->all(), [
            'name'          => 'required',
            'commission'    => 'required',
            'invoices'      => 'required'
        ]);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Agency::fin($id)->update([
                'name'          => $this->request->name,
                'commission'    => $this->request->commission,
                'invoice'       => $this->request->invoice
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        Agency::destroy($id);
        return response("", 204);
    }
}
