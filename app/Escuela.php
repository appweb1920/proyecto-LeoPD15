<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Escuela extends Model
{

    protected $table = 'escuela';
    protected $fillable = ['nombre', 'grado'];
    protected $primaryKey = 'idEscuela';
    
}
