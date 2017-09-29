<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Información a contabilizar de un comprobante de nómina
    public function up()
    {
        Schema::create('nom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_tiponom')->nullable();
            $table->date('nom_f_inicial_pago')->nullable();
            $table->date('nom_f_final_pago')->nullable();
            $table->integer('nom_num_dias_pagados')->nullable();
            $table->double('nom_total_percep', 15, 8);
            $table->double('nom_total_deduc', 15, 8);
            $table->double('nom_total_otrospag', 15, 8);
            $table->double('nom_total_sueldo', 15, 8);
            $table->double('nom_total_separindemn', 15, 8);
            $table->double('nom_total_jubilpens', 15, 8);
            $table->double('nom_percep_grav', 15, 8);
            $table->double('nom_percep_exent', 15, 8);
            $table->double('nom_total_otrasdeduc', 15, 8);
            $table->double('nom_total_impreten', 15, 8);

            $table->integer('nom_comp_id')->unsigned();
            $table->foreign('nom_comp_id')->references('id')->on('comp')->onDelete('cascade');
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
        Schema::dropIfExists('nom');
    }
}
