<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniforme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniforme', function (Blueprint $table) {
            $table->bigIncrements('idUniforme');
            $table->unsignedBigInteger('idEscuelaUniforme');
            $table->string('Foto');
            $table->integer('cantidad');
            $table->float('costo');
            $table->string('tipo');
            $table->string('talla');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('idEscuelaUniforme')->references('idEscuela')->on('Escuela')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uniforme', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
    
}
