<?php

namespace App\Http\Controllers;

use App\Models\Agencias;
use Illuminate\Http\Request;

class AgenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['agencias']=Agencias::paginate(5);
        return view('agencias.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("agencias.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // $campos=[
        //     'name' => 'required|string|max:100',
        //     'commission' => 'required|decimal',
        //     'invoice' => 'require|string|max:50'
        // ];
        // $Mensaje=["require"=>"El :attribute es requerido"];
        // $this->validate($request,$campos,$Mensaje);

        // $datosAgencia=request()->all();
        $datosAgencia=request()->except('_token');
        Agencias::insert($datosAgencia);

        // return response()->json($datosAgencia);
        return redirect('agencias')->with("Mensaje","Agencia agregada con éxito.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agencias  $agencias
     * @return \Illuminate\Http\Response
     */
    public function show(Agencias $agencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agencias  $agencias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agencia = Agencias::findOrFail($id);
        
        return view('agencias.edit',compact('agencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agencias  $agencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAgencia=request()->except(['_token','_method']);
        Agencias::where('id','=',$id)->update($datosAgencia);

        // $agencia = Agencias::findOrFail($id);
        // return view('agencias.edit',compact('agencia'));
        return redirect('agencias')->with("Mensaje","Agencia modificada con éxito.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agencias  $agencias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agencias::destroy($id);

        return redirect('agencias')->with("Mensaje","Agencia eliminada.");
    }
}
