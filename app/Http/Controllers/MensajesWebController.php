<?php

namespace App\Http\Controllers;

use App\Models\Mensajes_web;
use App\Http\Controllers\Controller;
use App\Mail\WebConsultingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MensajesWebController extends Controller
{

    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajes = Mensajes_web::orderBy('created_at', 'desc')->get();
        return view('admin.mensajes.index', compact('mensajes'));
    }

    public function leidos(Request $request)
    {
 
        $mensajesLeidos = DB::select('CALL mensajes_leidos()');

        return view('admin.mensajes.leidos', compact('mensajesLeidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $response = response(["message"=> "Mensaje enviado"],201);
        Mensajes_web::create([
        'nombre' => $this->request->nombre,
        'correo' => $this->request->correo,
        'mensaje'   => $this->request->mensaje,
        ]);
        
        return $response;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensajes_web  $mensajes_web
     * @return \Illuminate\Http\Response
     */
    public function show(Mensajes_web $mensajes_web)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensajes_web  $mensajes_web
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensajes_web $mensajes_web)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensajes_web  $mensajes_web
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensajes_web $mensajes_web)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensajes_web  $mensajes_web
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = Mensajes_web::find($id);
        $mensaje->delete();
        return response("", 204);
    }

    public function reply(Request $request){
        
        $validator = Validator::make($request->all(), [
            'clientName' => 'required',
            'message' => 'required',
            'subject' => 'required',
            'email' => 'required'
        ], [
            'required' => 'El :attribute es requerido '
        ]);
        
        if (!$validator->fails()){
            
            Mail::to($request->email)->send(new WebConsultingMail($request->message, $request->subject, $request->clientName));
            return response()->json([
                'error' => false,
                'message' => 'Mensaje enviado',
                'errors' => []
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Algo salió mal',
            'errors' => $validator->errors()
        ]);
        
    }
}
