<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamiento extends Model
{
    protected $table = "equipamiento";
    protected $primaryKey = "idEquipamiento";
    protected $fillable = ['nombre','foto', 'precio', 'talla'];
}
