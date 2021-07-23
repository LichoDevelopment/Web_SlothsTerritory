<?php

namespace App\Http\Controllers;

use App\Models\Mensajes_web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $mensajes = Mensajes_web::all();
        return view('admin.mensajes.index', compact('mensajes'));
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
    public function destroy(Mensajes_web $mensajes_web)
    {
        //
    }
}
