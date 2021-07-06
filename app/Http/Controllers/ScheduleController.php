<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        return Schedule::all();
    }
    public function store()
    {
        $response = response("",201);

        $validator = Validator::make($this->request->all(), [
            'time' => 'required',
        ]);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Schedule::create([
                'time' => $this->request->time
            ]);
        }

        return $response;
    }

    public function update($id)
    {
        $response = response("",202);

        $validator = Validator::make($this->request->all(), [
            'time' => 'required',
        ]);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Schedule::find($id)->update([
                'time' => $this->request->time
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        Schedule::destroy($id);
        return response("", 204);
    }
}
