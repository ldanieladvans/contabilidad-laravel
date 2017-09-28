<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompsald extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Información de compensación de saldos asociada a detalle de nómina
    public function up()
    {
        Schema::create('compsald', function (Blueprint $table) {
            $table->increments('id');
            $table->string('compsald_anio')->nullable();
            $table->double('compsald_saldoafav', 15, 8);
            $table->double('compsald_remsald', 15, 8);
            $table->integer('compsald_nomdet_id')->unsigned();
            $table->foreign('compsald_nomdet_id')->references('id')->on('nomdet')->onDelete('cascade');
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
        Schema::dropIfExists('compsald');
    }
}
