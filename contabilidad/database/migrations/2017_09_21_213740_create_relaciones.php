<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('comp', function($table)
            {
                $table->integer('comp_asiento_id')->unsigned();
                $table->foreign('comp_asiento_id')->references('id')->on('asiento')->onDelete('set null');

            });

        Schema::table('comprel', function($table)
            {
                $table->integer('comprel_comp_id')->unsigned();
                $table->foreign('comprel_comp_id')->references('id')->on('comp')->onDelete('set null');

                $table->integer('comprel_comp_rel_id')->unsigned();
                $table->foreign('comprel_comp_rel_id')->references('id')->on('comp')->onDelete('set null');

            });

        

        Schema::table('asiento', function($table)
            {
                $table->integer('asiento_ctacont_id')->unsigned();
                $table->foreign('asiento_ctacont_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('asiento_polz_id')->unsigned();
                $table->foreign('asiento_polz_id')->references('id')->on('polz')->onDelete('set null');

            });

        Schema::table('ctacont', function($table)
            {
                $table->integer('ctacont_tiposubcta_id')->unsigned();
                $table->foreign('ctacont_tiposubcta_id')->references('id')->on('tiposubcta')->onDelete('set null');
            });

        Schema::table('period', function($table)
            {
                $table->integer('period_ejerc_id')->unsigned();
                $table->foreign('period_ejerc_id')->references('id')->on('ejerc')->onDelete('set null');
            });

        Schema::table('polz', function($table)
            {
                $table->integer('polz_period_id')->unsigned();
                $table->foreign('polz_period_id')->references('id')->on('period')->onDelete('set null');
            });

        Schema::table('blnza', function($table)
            {
                $table->integer('blnza_period_id')->unsigned();
                $table->foreign('blnza_period_id')->references('id')->on('period')->onDelete('set null');

                $table->integer('blnza_ctacont_id')->unsigned();
                $table->foreign('blnza_ctacont_id')->references('id')->on('ctacont')->onDelete('set null');
            });

        Schema::table('provis', function($table)
            {
                $table->integer('provis_comp_id')->unsigned();
                $table->foreign('provis_comp_id')->references('id')->on('comp')->onDelete('set null');
            });

        Schema::table('pago', function($table)
            {
                $table->integer('pago_comp_id')->unsigned();
                $table->foreign('pago_comp_id')->references('id')->on('comp')->onDelete('set null');

                $table->integer('pago_polz_id')->unsigned();
                $table->foreign('pago_polz_id')->references('id')->on('polz')->onDelete('set null');
            });

        Schema::table('pagoimp', function($table)
            {
                $table->integer('pagoimp_pago_id')->unsigned();
                $table->foreign('pagoimp_pago_id')->references('id')->on('pago')->onDelete('set null');
            });

        Schema::table('impdet', function($table)
            {
                $table->integer('impdet_pagoimp_id')->unsigned();
                $table->foreign('impdet_pagoimp_id')->references('id')->on('pagoimp')->onDelete('set null');
            });

        Schema::table('polzcomp', function($table)
            {
                $table->integer('polzcomp_polz_id')->unsigned();
                $table->foreign('polzcomp_polz_id')->references('id')->on('polz')->onDelete('set null');

                $table->integer('polzcomp_comp_id')->unsigned();
                $table->foreign('polzcomp_comp_id')->references('id')->on('comp')->onDelete('set null');
            });

        Schema::table('pagorel', function($table)
            {
                $table->integer('pagorel_pago_id')->unsigned();
                $table->foreign('pagorel_pago_id')->references('id')->on('pago')->onDelete('set null');

                $table->integer('pagorel_asiento_id')->unsigned();
                $table->foreign('pagorel_asiento_id')->references('id')->on('asiento')->onDelete('set null');
            });



         Schema::table('tipcliente', function($table)
            {
                $table->integer('tipcliente_cta_ingreso_id')->unsigned()->nullable();
                $table->foreign('tipcliente_cta_ingreso_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipcliente_cta_desc_id')->unsigned()->nullable();
                $table->foreign('tipcliente_cta_desc_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipcliente_cta_iva_traslad_x_cob_id')->unsigned()->nullable();
                $table->foreign('tipcliente_cta_iva_traslad_x_cob_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipcliente_cta_iva_traslad_cob_id')->unsigned()->nullable();
                $table->foreign('tipcliente_cta_iva_traslad_cob_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipcliente_cta_iva_reten_x_cob_id')->unsigned()->nullable();
                $table->foreign('tipcliente_cta_iva_reten_x_cob_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipcliente_cta_iva_reten_cob_id')->unsigned()->nullable();
                $table->foreign('tipcliente_cta_iva_reten_cob_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipcliente_cta_isr_reten_id')->unsigned()->nullable();
                $table->foreign('tipcliente_cta_isr_reten_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipcliente_cta_por_cobrar_id')->unsigned()->nullable();
                $table->foreign('tipcliente_cta_por_cobrar_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipcliente_cta_anticp_client_id')->unsigned();
                $table->foreign('tipcliente_cta_anticp_client_id')->references('id')->on('ctacont')->onDelete('set null');

            });

         Schema::table('cliente', function($table)
            {
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

                $table->integer('cliente_direc_id')->unsigned()->nullable();
                $table->foreign('cliente_direc_id')->references('id')->on('direc')->onDelete('set null');

                $table->integer('cliente_cta_anticp_client_id')->unsigned();
                $table->foreign('cliente_cta_anticp_client_id')->references('id')->on('ctacont')->onDelete('set null');
            });

         Schema::table('prodingr', function($table)
            {
                $table->integer('prodingr_tipcliente_id')->unsigned()->nullable();
                $table->foreign('prodingr_tipcliente_id')->references('id')->on('tipcliente')->onDelete('set null');

                $table->integer('prodingr_cliente_id')->unsigned()->nullable();
                $table->foreign('prodingr_cliente_id')->references('id')->on('cliente')->onDelete('set null');

                $table->integer('prodingr_cta_ingr_id')->unsigned();
                $table->foreign('prodingr_cta_ingr_id')->references('id')->on('ctacont')->onDelete('set null');
            });

         Schema::table('tipprov', function($table)
            {
                $table->integer('tipprov_cta_egreso_id')->unsigned()->nullable();
                $table->foreign('tipprov_cta_egreso_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipprov_cta_desc_id')->unsigned()->nullable();
                $table->foreign('tipprov_cta_desc_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipprov_cta_iva_acredit_x_cob_id')->unsigned()->nullable();
                $table->foreign('tipprov_cta_iva_acredit_x_cob_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipprov_cta_iva_acredit_cob_id')->unsigned()->nullable();
                $table->foreign('tipprov_cta_iva_acredit_cob_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipprov_cta_iva_reten_x_cob_id')->unsigned()->nullable();
                $table->foreign('tipprov_cta_iva_reten_x_cob_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipprov_cta_iva_reten_cob_id')->unsigned()->nullable();
                $table->foreign('tipprov_cta_iva_reten_cob_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipprov_cta_isr_reten_id')->unsigned()->nullable();
                $table->foreign('tipprov_cta_isr_reten_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipprov_cta_por_pagar_id')->unsigned()->nullable();
                $table->foreign('tipprov_cta_por_pagar_id')->references('id')->on('ctacont')->onDelete('set null');

                $table->integer('tipprov_cta_anticp_prov_id')->unsigned();
                $table->foreign('tipprov_cta_anticp_prov_id')->references('id')->on('ctacont')->onDelete('set null');
            });

         Schema::table('proveed', function($table)
            {
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

                $table->integer('proveed_tipprov_id')->unsigned()->nullable();
                $table->foreign('proveed_tipprov_id')->references('id')->on('tipprov')->onDelete('set null');

                $table->integer('proveed_direc_id')->unsigned()->nullable();
                $table->foreign('proveed_direc_id')->references('id')->on('direc')->onDelete('set null');

                $table->integer('proveed_cta_anticp_prov_id')->unsigned();
                $table->foreign('proveed_cta_anticp_prov_id')->references('id')->on('ctacont')->onDelete('set null');
            });

         Schema::table('prodgast', function($table)
            {
                $table->integer('prodgast_tipprov_id')->unsigned()->nullable();
                $table->foreign('prodgast_tipprov_id')->references('id')->on('tipprov')->onDelete('set null');

                $table->integer('prodgast_proveed_id')->unsigned()->nullable();
                $table->foreign('prodgast_proveed_id')->references('id')->on('proveed')->onDelete('set null');

                $table->integer('prodgast_cta_gast_id')->unsigned();
                $table->foreign('prodgast_cta_gast_id')->references('id')->on('ctacont')->onDelete('set null');
            });

         Schema::table('bitac', function($table)
            {
                $table->integer('bitac_user_id')->unsigned()->nullable();
                $table->foreign('bitac_user_id')->references('id')->on('users')->onDelete('set null');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
