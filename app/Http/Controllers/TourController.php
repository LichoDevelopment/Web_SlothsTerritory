<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TourController extends Controller
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
            'schedule_id'   => 'required|exists:App\Models\Schedule,id',
        ]);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Tour::create([
                'name'          => $this->request->name,
                'schedule_id'   => $this->request->schedule_id,
            ]);
        }

        return $response;
    }

    public function update($id)
    {
        $response = response("",202);

        $validator = Validator::make($this->request->all(), [
            'name'          => 'required',
            'schedule_id'   => 'required|exists:App\Models\Schedule,id',
        ]);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Tour::fin($id)->update([
                'name'          => $this->request->name,
                'schedule_id'   => $this->request->schedule_id,
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        Tour::destroy($id);
        return response("", 204);
    }
    

}
