<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Comprobantes relacionados a comprobante principal, de nodo de Documentos relacionados del comprobante
    public function up()
    {
        Schema::create('comprel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comprel_tiporel_cod');
            $table->string('comprel_tiporel_nom');
            $table->string('comprel_comp_rel_uuid');
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
        Schema::dropIfExists('comprel');
    }
}
