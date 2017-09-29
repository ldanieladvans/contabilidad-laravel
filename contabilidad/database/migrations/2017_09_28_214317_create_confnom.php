<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfnom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Tabla para configurar por defecto cuentas contables para la contabilización de nómina

    public function up()
    {
        Schema::create('confnom', function (Blueprint $table) {
            $table->increments('id');
            //Contendrá tres valores:
            //1. Contabilizar por totales: total de percepción, total de deducción, total de otros pagos, campos presentes en tabla nom, donde se tomarán cuentas configuradas a continuación para la contabilización.
            //2. Contabilizar por cada concepto, donde se tomarán cuentas configuradas para cada concepto en tabla confconc.
            $table->string('confnom_contabiliz_nom')->nullable();
            //Cuenta contable por pagar para contabilizar por defecto la provisión de la nómina
            $table->integer('confnom_prov_nom_cta_id')->unsigned()->nullable();
            $table->foreign('confnom_prov_nom_cta_id')->references('id')->on('ctacont')->onDelete('set null');
            //Cuenta contable de gastos para contabilizar por defecto cualquier gasto de nómina, en caso de que algún concepto de percepción no tenga configurada su cuenta de gasto en tabla confconc
            $table->integer('confnom_percep_cta_id')->unsigned()->nullable();
            $table->foreign('confnom_percep_cta_id')->references('id')->on('ctacont')->onDelete('set null');
            //Cuenta contable pasivo para contabilizar por defecto cualquier retención de nómina, en caso de que algún concepto de retención no tenga configurada su cuenta de pasivo en tabla confconc
            $table->integer('confnom_retenc_cta_id')->unsigned()->nullable();
            $table->foreign('confnom_retenc_cta_id')->references('id')->on('ctacont')->onDelete('set null');
            //Cuenta contable de gastos para contabilizar por defecto cualquier percepción de otros pagos de nómina, en caso de que algún concepto de otros pagos no tenga configurada su cuenta de gasto en tabla confconc
            $table->integer('confnom_otrospag_cta_id')->unsigned()->nullable();
            $table->foreign('confnom_otrospag_cta_id')->references('id')->on('ctacont')->onDelete('set null');

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
        Schema::dropIfExists('confnom');
    }
}
