<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitac', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('bitac_fecha');
            $table->string('bitac_modulo')->nullable();
            $table->string('bitac_ip')->nullable();
            $table->string('bitac_naveg')->nullable();
            $table->string('bitac_tipo_op')->nullable();
            $table->text('bitac_msg')->nullable();
            $table->text('bitac_result')->nullable();
            $table->text('bitac_dato')->nullable();
            $table->string('bitac_user')->nullable();
            
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
        Schema::dropIfExists('bitac');
    }
}
