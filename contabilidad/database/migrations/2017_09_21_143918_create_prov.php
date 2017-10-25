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
            $table->double('provis_monto', 15, 8)->nullable();
            $table->string('provis_moneda_cod')->nullable();
            $table->string('provis_moneda_nom')->nullable();
            $table->float('provis_tipo_cambio')->nullable();
            $table->string('provis_metpago_cod')->nullable();
            $table->string('provis_formpago_cod')->nullable();
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
