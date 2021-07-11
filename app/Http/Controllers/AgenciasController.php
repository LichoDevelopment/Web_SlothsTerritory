<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
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
        $datos['agencias']=Agencia::paginate(5);
        return view('admin.agencias.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.agencias.create");
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
        Agencia::insert($datosAgencia);

        // return response()->json($datosAgencia);
        return redirect('/agencias')->with("Mensaje","Agencia agregada con éxito.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agencia  $agencias
     * @return \Illuminate\Http\Response
     */
    public function show(Agencia $agencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agencia  $agencias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agencia = Agencia::findOrFail($id);
        
        return view('admin.agencias.edit',compact('agencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agencia  $agencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAgencia=request()->except(['_token','_method']);
        Agencia::where('id','=',$id)->update($datosAgencia);

        // $agencia = Agencia::findOrFail($id);
        // return view('agencias.edit',compact('agencia'));
        return redirect('/agencias')->with("Mensaje","Agencia modificada con éxito.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agencia  $agencias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agencia::destroy($id);

        return redirect('/agencias')->with("Mensaje","Agencia eliminada.");
    }
}
