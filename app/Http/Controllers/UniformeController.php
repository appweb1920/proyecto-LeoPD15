<?php

namespace App\Http\Controllers;

use App\Uniforme;
use App\Talla;
use App\Escuela;
use App\VentaUniforme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



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
            $tallas = DB::select(
                'SELECT * FROM talla
                INNER JOIN uniforme
                ON talla.idTallaUniforme = uniforme.idUniforme
                WHERE uniforme.idUniforme = ' . $id 
            );
            $ventas = DB::select(
                'SELECT * FROM venta_uniforme
                INNER JOIN uniforme
                ON venta_uniforme.idVentaUniforme = uniforme.idUniforme
                WHERE uniforme.idUniforme = ' . $id
            );
            //Ir a la vista del uniforme con todo lo necesario, su escuela, el uniforme en cuestión, las tallas y las ventas
            return view('uniforme')->with('uniforme',$uniforme)->with('escuela', $escuela)
            ->with('tallas', $tallas)->with("ventas", $ventas);
        }
    }
    public function edit($id)
    {
        $uniforme = Uniforme::find($id);
        return view('editaUniforme')->with("uniforme", $uniforme);
    }

    public function update(Request $request)
    {
        $uniforme = Uniforme::find($request->idUniforme);
        $uniforme->genero = $request->genero;
        $uniforme->tipo = $request->tipo;
        if(!is_null($request->file('foto'))){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs(
                'public/uniformes', $uniforme->idUniforme . "." . $extension);
            $uniforme->foto = $uniforme->idUniforme . "." . $extension;
        }
        $uniforme->save();
        return redirect('/Uniforme/' . $request->idUniforme);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uniforme  $uniforme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uniforme = Uniforme::find();
        Storage::delete('file.jpg');
    }
}
