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
            $table->unsignedBigInteger('idEscuelaUniforme')->nullable();
            $table->string('foto')->default('logo.jpg');
            $table->string('genero');
            $table->string('tipo');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('idEscuelaUniforme')->references('idEscuela')->on('Escuela')->onDelete('set null');
        });

        DB::table('uniforme')->insert([
            'idEscuelaUniforme' => '1',
            'foto' => '1.jpg',
            'genero' => 'niña',
            'tipo' => 'diario'
        ]);
        
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
