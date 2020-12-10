<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Uniforme extends Model
{

    protected $table = 'uniforme';
    protected $primaryKey = 'idUniforme';
    

    public function getEscuela($id)
    {
        $escuela = DB::select(
            'SELECT * FROM Uniforme 
            INNER JOIN Escuela
            ON Uniforme.idEscuelaUniforme = Escuela.idEscuela
            WHERE Escuela.idEscuela = ' . $id
        );
        return $escuela;
    }
}
