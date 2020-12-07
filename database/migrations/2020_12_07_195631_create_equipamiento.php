<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniforme', function (Blueprint $table) {
            $table->bigIncrements('idEquipamiento');
            $table->string('nombre');
            $table->string('foto')->default('logo.jpg');
            $table->float('precio');
            $table->string('talla')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipamiento', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
