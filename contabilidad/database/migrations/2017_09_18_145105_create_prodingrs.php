<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdingrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Desglose de cuenta de ingreso para cada código de concepto del SAT, asociado a cada tipo de cliente o cliente
    public function up()
    {
        Schema::create('prodingr', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prodingr_cod_prod')->nullable();
           
            
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
        Schema::dropIfExists('prodingr');
    }
}
