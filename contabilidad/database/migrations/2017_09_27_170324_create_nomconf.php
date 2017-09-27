<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomconf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomconf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomconf_descripcion')->nullable();
            $table->string('nomconf_codsat')->nullable();
            $table->string('nomconf_tipoconcepto')->nullable();
            $table->integer('nomconf_gast_cta_id')->unsigned()->nullable();
            $table->foreign('nomconf_gast_cta_id')->references('id')->on('ctacont')->onDelete('set null');
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
        Schema::dropIfExists('nomconf');
    }
}
