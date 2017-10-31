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
            $table->double('asiento_debe', 15, 2)->default(0.0);
            $table->double('asiento_haber', 15, 2)->default(0.0);
            $table->string('asiento_folio_ref')->nullable();
            $table->boolean('asiento_activo')->default(true);
            $table->boolean('asiento_manual')->default(false);
            $table->date('asiento_fecha')->nullable();
            $table->double('asiento_saldo_anterior', 15, 2)->default(0.0)->nullable();
            $table->double('asiento_saldo_actual', 15, 2)->default(0.0)->nullable();
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
