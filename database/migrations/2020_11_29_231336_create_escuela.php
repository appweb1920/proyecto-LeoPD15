<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscuela extends Migration
{
    public function up()
    {
        Schema::create('escuela', function (Blueprint $table) {
            $table->bigIncrements('idEscuela');
            $table->string('nombre');
            $table->string('grado');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('escuela')->insert([
            'nombre' => 'China',
            'grado' => 'Secundaria'
        ]);
    }
    public function down()
    {
        Schema::table('escuela', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
