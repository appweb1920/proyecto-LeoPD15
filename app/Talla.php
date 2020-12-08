<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table="talla";
    protected $primaryKey = "idTalla";
    protected $fillable = ['talla', 'cantidad','precio'];
}
