<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormapago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Configuración de cuentas contables asociadas a las diferentes formas de pago
    public function up()
    {
        Schema::create('formpago', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formpago_formpagosat_cod');
            $table->string('formpago_formpagosat_nom');
            $table->integer('formpago_ctacont_id')->unsigned();
            $table->foreign('formpago_ctacont_id')->references('id')->on('ctacont');
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
        Schema::dropIfExists('formpago');
    }
}
