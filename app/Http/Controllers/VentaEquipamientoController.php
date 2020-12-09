<?php

namespace App\Http\Controllers;

use App\VentaEquipamiento;
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
            'cantidad' => "required"
        ], $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $venta = new VentaEquipamiento();
        $venta->idVentaEquipamiento = $request->idVentaEquipamiento;
        $venta->cantidad = $request->cantidad;
        $venta->talla = $request->talla;
        $venta->dia = Carbon::now()->format('Y-m-d');
        $venta->save();

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
