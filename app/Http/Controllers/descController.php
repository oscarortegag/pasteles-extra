<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\descripcion;
use App\pastel;
class descController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $descripcion = new Descripcion();
        $descripcion->pastel_id = $request->input('pasteles');
        $descripcion->desc = $request->input('descripcion');
        $descripcion->ingredientes = $request->input('ingredientes');
        $descripcion->save();
        return redirect()->back()->with('Alerta', 'No hay nadie en el estacionamiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $descripcion = descripcion::find($id);
        $pasteles = pastel::all();
        return view('verE',compact('descripcion', 'pasteles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $descripcion = descripcion::find($id);
        $pasteles = pastel::all();

        return view('editarE',compact('descripcion', 'pasteles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pas=$request->input('pasteles');
        $desc=$request->input('descripcion');
        $ing=$request->input('ingredientes');
        $editP = descripcion::find($id);

        $editP->pastel_id=$pas;
        $editP->desc=$desc;
        $editP->ingredientes=$ing;
        $editP->save();
        return redirect()->route('pasteles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $descripcion = descripcion::find($id);
        $descripcion->delete();
        return redirect()->back();
    }
}
