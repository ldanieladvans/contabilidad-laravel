<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_config', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('is_config')->default(false);

            /* Clientes */
            $table->integer('cliente_cta_ingreso_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_ingreso_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_desc_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_desc_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_iva_traslad_x_cob_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_iva_traslad_x_cob_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_iva_traslad_cob_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_iva_traslad_cob_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_iva_reten_x_cob_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_iva_reten_x_cob_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_iva_reten_cob_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_iva_reten_cob_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_isr_reten_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_isr_reten_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_por_cobrar_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_por_cobrar_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_tipcliente_id')->unsigned()->nullable();
            $table->foreign('cliente_tipcliente_id')->references('id')->on('tipcliente')->onDelete('set null');

            $table->integer('cliente_cta_anticp_client_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_anticp_client_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_isr_reten_cob_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_isr_reten_cob_id')->references('id')->on('ctacont')->onDelete('set null');


            $table->integer('cliente_cta_ieps_por_cobrar_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_ieps_por_cobrar_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_ieps_cobrado_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_ieps_cobrado_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_ieps_reten_por_cobrar_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_ieps_reten_por_cobrar_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('cliente_cta_ieps_reten_cobrado_id')->unsigned()->nullable();
            $table->foreign('cliente_cta_ieps_reten_cobrado_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->string('cliente_concepto')->nullable();

            

            /* Proveedores */
            $table->integer('proveed_cta_egreso_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_egreso_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_desc_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_desc_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_iva_acredit_x_cob_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_iva_acredit_x_cob_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_iva_acredit_cob_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_iva_acredit_cob_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_iva_reten_x_cob_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_iva_reten_x_cob_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_iva_reten_cob_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_iva_reten_cob_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_isr_reten_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_isr_reten_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_por_pagar_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_por_pagar_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_anticp_prov_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_anticp_prov_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_isr_reten_cob_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_isr_reten_cob_id')->references('id')->on('ctacont')->onDelete('set null');


            $table->integer('proveed_cta_ieps_por_cobrar_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_ieps_por_cobrar_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_ieps_cobrado_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_ieps_cobrado_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_ieps_reten_por_cobrar_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_ieps_reten_por_cobrar_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->integer('proveed_cta_ieps_reten_cobrado_id')->unsigned()->nullable();
            $table->foreign('proveed_cta_ieps_reten_cobrado_id')->references('id')->on('ctacont')->onDelete('set null');

            $table->string('proveedor_concepto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_config');
    }
}
