<?php

namespace App\Http\Controllers;

use App\Uniforme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniformeController extends Controller
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
        if(Auth::user()->rol == 'administrador' || Auth::user()->rol == 'privilegio'){
            return view('registraUniforme');
        }
        return back();
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
