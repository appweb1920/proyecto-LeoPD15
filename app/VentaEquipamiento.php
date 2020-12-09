<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaEquipamiento extends Model
{
    protected $table="venta_equipamiento";
    protected $primaryKey = "idVenta";
    protected $fillable = ['idVentaEquipamiento', 'dia', 'cantidad'];
}
