<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatSatBancos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_sat_bancos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cat_sat_bancos_clave');
            $table->string('cat_sat_bancos_nombre_corto',50);
            $table->string('cat_sat_bancos_razon_social',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_sat_bancos');
    }
}
