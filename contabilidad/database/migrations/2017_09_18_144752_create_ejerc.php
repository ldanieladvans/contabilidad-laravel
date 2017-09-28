<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjerc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Ejercicios fiscales
    public function up()
    {
        Schema::create('ejerc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ejerc_anio');
            $table->boolean('ejerc_cerrado')->default(false);
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
        Schema::dropIfExists('ejerc');
    }
}
