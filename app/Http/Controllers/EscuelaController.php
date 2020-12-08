<?php

namespace App\Http\Controllers;

use App\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EscuelaController extends Controller
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
        $escuelas = Escuela::all();
        if(!Auth::user()){
            return redirect('inicio');
        }else if(Auth::user()->rol == "administrador"){
            //$escuelas = Escuela::all();
            //return view("registroEscuela")->with("escuelas", $escuelas);
            return view("registroEscuela")->with('escuelas', $escuelas);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            "nombre.max" => "El nombre de la escuela no puede pasar de 20 carácteres!",
            'required'=>'Éste campo es requerido!'
        ];

        $validator = Validator::make($request->all(), [
            'nombre'=> 'required|max:20',
            'turno' => 'required',
            'grado' => 'required'
        ], $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $escuela = new Escuela();
        $escuela->nombre = $request->nombre;
        $escuela->grado = $request->grado;
        $escuela->turno = $request->turno;
        $escuela->save();
        return redirect('/Escuelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function show(Escuela $escuela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function edit(Escuela $escuela)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escuela $escuela)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escuela $escuela)
    {
        //
    }
}
