<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Uniforme extends Model
{


    public function getUniformesGrado(string $grado)
    {
        $uniformesG = DB::select(
            'SELECT * FROM Uniforme 
            INNER JOIN Escuela
            ON Uniforme.idEscuela = Escuela.idEsucela
            WHERE Escuela.grado = ' . $grado
        );
        return $uniformesG;
    }
}
