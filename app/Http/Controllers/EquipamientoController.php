<?php

namespace App\Http\Controllers;

use App\Equipamiento;
use App\VentaEquipamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EquipamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function create()
    {
        return view('registraEquipamiento');
    }

    public function store(Request $request)
    {
        $messages =[
            'required' => 'Este campo es requerido!',

        ];
        $validator = Validator::make($request->all(),[
            'nombre' => "required",
            'precio' => "required",
            'talla' => "required",
        ], $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $equipamiento = new Equipamiento();
        $equipamiento->nombre = $request->nombre;
        $equipamiento->precio = $request->precio;
        $equipamiento->cantidad = $request->cantidad;
        $equipamiento->talla = $request->talla;
        $equipamiento->foto = "";
        $equipamiento->save();
        if($request->file('foto') != 'null'){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs(
                    'public/equipamiento', $equipamiento->idEquipamiento . "." . $extension);
            
            $equipamiento->foto = $equipamiento->idEquipamiento . "." . $extension;
        }
        $equipamiento->save();
        return redirect('/inicio');


    }

    public function show($id)
    {
        $equipamiento = Equipamiento::find($id);
        $ventas = DB::select(
            'SELECT * FROM venta_equipamiento
            INNER JOIN equipamiento
            ON venta_equipamiento.idVentaEquipamiento = equipamiento.idEquipamiento
            WHERE equipamiento.idEquipamiento = ' . $id
        );
        return view('equipamiento')->with('equipamiento', $equipamiento)->with('ventas', $ventas);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipamiento $equipamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipamiento $equipamiento)
    {
        //
    }

    public function destroy($id)
    {
        $equipamiento = Equipamiento::find($id);
        Storage::delete('Equipamiento/' . $equipamiento->foto);
        $equipamiento->delete();
        return redirect('/inicio');
    }
}
