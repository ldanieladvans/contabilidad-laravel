<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatSat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_sat', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cat_sat_nivel');
            $table->float('cat_sat_codigo_agrupador');
            $table->string('cat_sat_nombre_cuenta',200);
            $table->string('cat_sat_tipo',30);
            $table->string('cat_sat_subtipo',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_sat');
    }
}
