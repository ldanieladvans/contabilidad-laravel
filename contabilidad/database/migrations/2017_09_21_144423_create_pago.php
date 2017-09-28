<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Información a contabilizar de comprobante con complemento de pago
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('id');
            $table->double('pago_monto', 15, 8);
            $table->date('pago_fecha');
            $table->string('pago_formpago_cod')->nullable();
            $table->string('pago_formpago_nom')->nullable();
            $table->string('pago_moneda_cod')->nullable();
            $table->string('pago_moneda_nom')->nullable();
            $table->float('pago_tipo_cambio')->nullable();
            $table->string('pago_numoperc')->nullable();
            $table->string('pago_rfcemisor_ctaord')->nullable();
            $table->string('pago_nombanc_emisor')->nullable();
            $table->string('pago_nombanc_ordext')->nullable();
            $table->string('pago_cta_ordnte')->nullable();
            $table->string('pago_rfcrecept_ctaben')->nullable();
            $table->string('pago_banc_dest')->nullable();
            $table->string('pago_banc_dest_ext')->nullable();
            $table->string('pago_cta_ben')->nullable();
            $table->string('pago_numcheq')->nullable();
            $table->string('pago_benef')->nullable();
            $table->text('pago_cert_pago')->nullable();
            $table->text('pago_sello_pago')->nullable();
            
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
        Schema::dropIfExists('pago');
    }
}
