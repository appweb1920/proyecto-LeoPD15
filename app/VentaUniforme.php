<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaUniforme extends Model
{
    protected $table="venta_uniforme";
    protected $primaryKey = "idVenta";
    protected $fillable = ['idVentaUniforme', 'dia', 'vendido', 'escuela'];
}
