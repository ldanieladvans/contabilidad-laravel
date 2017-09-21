<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtacont extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ctacont', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ctacont_catsat_cod');
            $table->string('ctacont_catsat_nom');
            $table->string('ctacont_tipocta_cod');
            $table->string('ctacont_tipocta_nom');
            $table->string('ctacont_num');
            $table->string('ctacont_desc');
            $table->string('ctacont_natur');
            $table->boolean('ctacont_efectivo')->default(false);
            $table->date('ctacont_f_iniciosat');
            $table->boolean('ctacont_decalarada')->default(false);
            $table->boolean('ctacont_pte_complnt')->default(false);
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
        Schema::dropIfExists('ctacont');
    }
}
