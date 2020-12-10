<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaUniforme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_uniforme', function (Blueprint $table) {
            $table->bigIncrements('idVenta');
            $table->unsignedBigInteger('idVentaUniforme')->nullable();
            $table->unsignedBigInteger('idVentaTalla')->nullable();
            $table->date('dia');
            $table->integer('talla');
            $table->integer('vendido');
            $table->string('escuela');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('idVentaUniforme')->references('idUniforme')->on('Uniforme')->onDelete('set null');
            $table->foreign('idVentaTalla')->references('idTalla')->on('Talla')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('venta_uniforme', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
