<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talla', function (Blueprint $table) {
            $table->bigIncrements('idTalla');
            $table->unsignedBigInteger('idTallaUniforme');
            $table->integer('talla');
            $table->integer('cantidad');
            $table->float('precio');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('idTallaUniforme')->references('idUniforme')->on('Uniforme')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('talla', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
