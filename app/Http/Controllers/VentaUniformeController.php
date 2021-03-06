<?php

namespace App\Http\Controllers;

use App\VentaUniforme;
use App\Talla;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VentaUniformeController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $messages = [
            "required" => "Este campo es requerido!"
        ];
        $validator = Validator::make($request->all(),[
            'idTallaVenta' => "required",
            'vendido' => "required"
        ], $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $venta = new VentaUniforme();        
        //dd($request);   
        $venta->idVentaTalla = $request->idTallaVenta;
        $venta->idVentaUniforme = $request->idVentaUniforme;
        $venta->dia = Carbon::now()->format('Y-m-d');
        $venta->talla = $request->tallaVenta;
        $venta->vendido = $request->vendido;
        $venta->escuela = $request->escuela;
        $venta->save();
        $talla = Talla::find($request->idTallaVenta);
        $talla->cantidad -= $request->vendido;
        $talla->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\VentaUniforme  $ventaUniforme
     * @return \Illuminate\Http\Response
     */
    public function show(VentaUniforme $ventaUniforme)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VentaUniforme  $ventaUniforme
     * @return \Illuminate\Http\Response
     */
    public function edit(VentaUniforme $ventaUniforme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VentaUniforme  $ventaUniforme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VentaUniforme $ventaUniforme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VentaUniforme  $ventaUniforme
     * @return \Illuminate\Http\Response
     */
    public function destroy(VentaUniforme $ventaUniforme)
    {
        //
    }
}
