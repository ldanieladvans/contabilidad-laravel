<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvisImpuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provisimp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provisimp_tipo');
            $table->string('provisimp_cod');
            $table->string('provisimp_nom')->nullable();
            $table->float('provisimp_monto');
            $table->integer('provisimp_provis_id')->unsigned()->index();
            $table->foreign('provisimp_provis_id')->references('id')->on('provis')->onDelete('cascade');
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
        Schema::dropIfExists('provisimp');
    }
}
