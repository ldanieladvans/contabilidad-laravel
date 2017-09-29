<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Almacena datos comunes de comprobante
    public function up()
    {
        Schema::create('comp', function (Blueprint $table) {
            $table->increments('id');

            //Datos básicos del comprobante
            $table->string('comp_uuid')->nullable();
            $table->string('comp_rfc_emisor')->nullable();
            $table->string('comp_rfc_receptor')->nullable();
            $table->date('comp_f_emision')->nullable();
            $table->string('comp_complmto')->nullable();
            $table->string('comp_tipocomp');

            //Campos en caso de ser otro tipo de comp diferente a CFDI
            $table->string('comp_cbb_serie')->nullable();
            $table->string('comp_cbb_numfolio')->nullable();
            $table->string('comp_num_factelect')->nullable();
            $table->string('comp_taxid')->nullable();

            //Campo para identificar si tiene complemento de pago
            $table->boolean('comp_espago')->default(false)->nullable();
            //Campo para identificar si es importado de bóveda
            $table->string('comp_imp_bov')->default(true)->nullable();

            
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
        Schema::dropIfExists('comp');
    }
}
