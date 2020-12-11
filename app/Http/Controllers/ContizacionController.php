<?php

namespace App\Http\Controllers;

use App\Equipamiento;
use Illuminate\Http\Request;

class ContizacionController extends Controller
{
    public function index()
    {
        $equipamiento = Equipamiento::all();
        return view('cotizar')->with('equipamiento', $equipamiento);
    }
}
