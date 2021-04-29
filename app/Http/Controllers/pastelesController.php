<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pastel;
use App\descripcion;
class pastelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasteles = pastel::all();
        $descripcion = descripcion::all();
        return view('indexP', compact('pasteles', 'descripcion'));
        
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
        $Pastel = new Pastel();
        $Pastel->nombre = $request->input('nombrePastel');
        $Pastel->precio = $request->input('precioPastel');
        $Pastel->save();
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
        $pastelE = pastel::find($id);
        return view('verP',compact('pastelE'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pastelE = pastel::find($id);
        return view('editarP',compact('pastelE'));
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
        $pastel=$request->input('nombrePastel');
        $precio=$request->input('precioPastel');

        $editP = pastel::find($id);
        $editP->nombre=$pastel;
        $editP->precio=$precio;
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
        $pastel = pastel::find($id);
        $pastel->delete();
        return redirect()->back();
    }

}
