<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Información a contabilizar de comprobante de ingreso o egreso
    public function up()
    {
        Schema::create('provis', function (Blueprint $table) {
            $table->increments('id');
            $table->double('provis_monto', 15, 8);
            $table->string('provis_moneda_cod');
            $table->string('provis_moneda_nom');
            $table->float('provis_tipo_cambio');
            $table->string('provis_metpago_cod');
            $table->string('provis_formpago_cod');
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
        Schema::dropIfExists('prov');
    }
}
