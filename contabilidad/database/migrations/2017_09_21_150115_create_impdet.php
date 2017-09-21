<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpdet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impdet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('impdet_tipo');
            $table->string('impdet_imp_cod');
            $table->string('impdet_imp_nom');
            $table->float('impdet_importe');
            $table->string('impdet_tipofact_cod');
            $table->float('impdet_tasacuota');
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
        Schema::dropIfExists('impdet');
    }
}
