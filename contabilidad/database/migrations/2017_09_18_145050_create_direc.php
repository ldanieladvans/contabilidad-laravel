<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direc_calle')->nullable();
            $table->string('direc_num_ext')->nullable();
            $table->string('direc_num_int')->nullable();
            $table->string('direc_colonia')->nullable();
            $table->string('direc_localidad')->nullable();
            $table->string('direc_municipio')->nullable();
            $table->string('direc_estado')->nullable();
            $table->string('direc_pais')->nullable();
            $table->string('direc_cp')->nullable();
            $table->string('direc_referencia')->nullable();
           
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
        Schema::dropIfExists('direc');
    }
}
