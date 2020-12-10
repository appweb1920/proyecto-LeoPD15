<?php

namespace App\Http\Controllers;

use App\VentaEquipamiento;
use App\Equipamiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VentaEquipamientoController extends Controller
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
            'idVentaEquipamiento' => "required",
            'vendido' => "required"
        ], $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        dd($request);
        $venta = new VentaEquipamiento();
        $venta->idVentaEquipamiento = $request->idVentaEquipamiento;
        $venta->vendido = $request->vendido;
        $venta->talla = $request->talla;
        $venta->dia = Carbon::now()->format('Y-m-d');
        $venta->save();
        $equipamiento = Equipamiento::find($request->idVentaEquipamiento);
        $equipamiento->cantidad -= $request->vendido;
        $equipamiento->save();
        return redirect()->back();
    }

    public function show(VentaEquipamiento $ventaEquipamiento)
    {
        //
    }

    public function edit(VentaEquipamiento $ventaEquipamiento)
    {
        //
    }

    public function update(Request $request, VentaEquipamiento $ventaEquipamiento)
    {
        //
    }

    public function destroy(VentaEquipamiento $ventaEquipamiento)
    {
        //
    }
}
