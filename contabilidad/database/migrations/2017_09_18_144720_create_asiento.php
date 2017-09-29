<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Asientos o transacciones contables
    public function up()
    {
        Schema::create('asiento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asiento_concepto')->nullable();
            $table->double('asiento_debe', 15, 8);
            $table->double('asiento_haber', 15, 8);
            $table->string('asiento_folio_ref');
            $table->boolean('asiento_activo')->default(true);
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
        Schema::dropIfExists('asiento');
    }
}
