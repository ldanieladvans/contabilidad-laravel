<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlnza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blnza', function (Blueprint $table) {
            $table->increments('id');
            $table->double('blnza_saldo_inicial', 15, 8);
            $table->double('blnza_cargos', 15, 8);
            $table->double('blnza_abonos', 15, 8);
            $table->double('blnza_saldo_final', 15, 8);

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
        Schema::dropIfExists('blnza');
    }
}
