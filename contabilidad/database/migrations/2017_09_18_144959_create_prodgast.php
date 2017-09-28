<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdgast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Desglose de cuenta gastos para cada código de concepto del SAT, asociado a tipo de proveedor o proveedor
    public function up()
    {
        Schema::create('prodgast', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prodgast_cod_prod')->nullable();
           
            
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
        Schema::dropIfExists('prodgast');
    }
}
