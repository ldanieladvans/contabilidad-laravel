<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Períodos fiscales
    public function up()
    {
        Schema::create('period', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('period_cerrado')->default(false);
            $table->boolean('period_de_cierre')->default(false);
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
        Schema::dropIfExists('period');
    }
}
