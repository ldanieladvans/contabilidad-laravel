<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoimp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Información de impuestos asociados a cada pago
    public function up()
    {
        Schema::create('pagoimp', function (Blueprint $table) {
            $table->increments('id');
            $table->float('pagoimp_total_reten');
            $table->float('pagoimp_total_trasl');
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
        Schema::dropIfExists('pagoimp');
    }
}
