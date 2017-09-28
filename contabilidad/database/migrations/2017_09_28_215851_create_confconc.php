<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfconc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Tabla para configurar cuentas contables para cada concepto de nómina, en caso de que se requiera tal desglose en la contabilización
    public function up()
    {
        Schema::create('confconc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('confconc_codsat')->nullable();
            $table->string('confconc_tipoconcpto')->nullable();
            //Cuenta contable de gasto o pasivo para contabilizar el concepto específico
            $table->integer('confconc_cta_id')->unsigned();
            $table->foreign('confconc_cta_id')->references('id')->on('ctacont')->onDelete('cascade');
           
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
        Schema::dropIfExists('confconc');
    }
}
