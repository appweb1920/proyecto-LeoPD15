<?php

namespace App\Http\Controllers;

use App\Uniforme;
use App\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



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
            'idEscuelaUniforme' => "required",
            'genero' => "required",
            'tipo' => "required",
        ], $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $uniforme = new Uniforme();
        $uniforme->idEscuelaUniforme = $request->idEscuelaUniforme;
        $uniforme->genero = $request->genero;
        $uniforme->tipo = $request->tipo;
        $uniforme->foto = "";
        $uniforme->save();
        if($request->file('foto') != 'null'){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs(
                    'public/uniformes', $uniforme->idUniforme . "." . $extension);
            
            $uniforme->foto = $uniforme->idUniforme . "." . $extension;
        }
        $uniforme->save();
        return redirect('/uniforme/tallas/' . $uniforme->idUniforme);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::user()){
            return redirect('/loginLU');
        }else{
            $uniforme = Uniforme::find($id);
            $escuela = Escuela::find($uniforme->idEscuelaUniforme);
            return view('uniforme')->with('uniforme',$uniforme)->with('escuela', $escuela);
        }
    }
    public function edit($id)
    {
        $uniforme = Uniforme::find($id);
    }

    public function update(Request $request)
    {
        $uniforme = Uniforme::find($request->idUniforme);
        $uniforme->idEscuelaUniforme = $request->idEscuelaUniforme;
        $uniforme->genero = $request->genero;
        $uniforme->tipo = $request->tipo;
        if(!is_null($request->file('foto'))){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs(
                'public/uniformes', $uniforme->idUniforme . "." . $extension);
            $uniforme->foto = $uniforme->idUniforme . "." . $extension;
        }
        $uniform->save();
        return back()->withInput();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete('file.jpg');
    }
}
