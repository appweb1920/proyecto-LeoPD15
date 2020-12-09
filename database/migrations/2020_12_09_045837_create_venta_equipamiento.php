<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaEquipamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_equipamiento', function (Blueprint $table) {
            $table->bigIncrements('idVenta');
            $table->unsignedBigInteger('idVentaEquipamiento');
            $table->date('dia');
            $table->integer('talla');
            $table->integer('cantidad');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('idVentaEquipamiento')->references('idEquipamiento')->on('Equipamiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venta_equipamiento', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
