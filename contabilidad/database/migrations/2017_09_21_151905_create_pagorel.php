<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagorel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagorel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pagorel_pagado_uuid')->nullable();
            $table->string('pagorel_serie')->nullable();
            $table->string('pagorel_folio')->nullable();
            $table->string('pagorel_formpago_cod')->nullable();
            $table->string('pagorel_formpago_nom')->nullable();
            $table->string('pagorel_moneda_cod')->nullable();
            $table->string('pagorel_moneda_nom')->nullable();
            $table->float('pagorel_tipo_cambio')->nullable();
            $table->integer('pagorel_numparcldad')->nullable();
            $table->double('pagorel_sald_ant', 15, 8);
            $table->double('pagorel_monto_pag', 15, 8);
            $table->double('pagorel_sald_nuevo', 15, 8);
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
        Schema::dropIfExists('pagorel');
    }
}
