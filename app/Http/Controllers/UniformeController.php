<?php

namespace App\Http\Controllers;

use App\Uniforme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Escuela;

class UniformeController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        if(!Auth::user()){return redirect('/inicio');}
        elseif(Auth::user()->rol == 'administrador' || Auth::user()->rol == 'privilegio'){
            $escuelas = Escuela::all();
            return view('registraUniforme')->with('escuelas', $escuelas);
        }
    }

    public function store(Request $request)
    {
        $messages = [
            "required" => "Este campo es requerido!",
            "min" => "No puede haber cantidades negativas"
        ];
        $validator = Validator::make($request->all(),[
            'escuela' => "required",
            'genero' => "required",
            'talla' => "required",
            'cantidad' => "required|min:0",
            'precio' => "required|min:0",
        ], $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function show(Uniforme $uniforme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function edit(Uniforme $uniforme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uniforme $uniforme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uniforme $uniforme)
    {
        //
    }
}
