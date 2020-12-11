<?php

namespace App\Http\Controllers;

use App\VentaUniforme;
use App\VentaEquipamiento;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $vU = VentaUniforme::all();
        $vE = VentaEquipamiento::all();

        return view('ventas')->with('ventasUniformes', $vU)->with('ventasEquipamiento', $vE);
    }
}
