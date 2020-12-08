<?php

namespace App\Http\Controllers;

use App\Talla;
use App\Uniforme;
use App\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TallaController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tallaUniforme = new Talla();
        $tallaUniforme->idTallaUniforme = $request->idTallaUniforme;
        $tallaUniforme->talla = $request->talla;
        $tallaUniforme->cantidad = $request->cantidad;
        $tallaUniforme->precio = $request->precio;
        $tallaUniforme->save();
        return redirect()->back();
        
    }

    public function show($id)
    {
        if(Auth::user()){
            
            $uniforme = Uniforme::find($id);
            $escuela = Escuela::find($uniforme->idEscuelaUniforme);
            $tallas = DB::select(
                'SELECT * FROM Talla
                INNER JOIN Uniforme
                ON Talla.idTallaUniforme = Uniforme.idUniforme
                WHERE Talla.idTallaUniforme =' . $id
            );
            return view('registraTalla')->with('uniforme', $uniforme)->with('escuela', $escuela)->with('tallas', $tallas);
        }
    }

    public function edit(Talla $talla)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talla  $talla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $talla = Talla::find($request->idTalla);
        $talla->precio = $request->precio; 
        $talla->cantidad = $request->cantidad; 
        $talla->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talla  $talla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talla $talla)
    {
        //
    }
}
