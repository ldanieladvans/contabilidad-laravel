<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatSatMonedas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_sat_monedas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('cat_sat_monedas_codigo',4);
            $table->string('cat_sat_monedas_nombre',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_sat_monedas');
    }
}
