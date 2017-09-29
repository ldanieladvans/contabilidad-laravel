<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Pólizas contables
    public function up()
    {
        Schema::create('polz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('polz_tipopolz');
            $table->date('polz_fecha');
            $table->string('polz_folio');
            $table->string('polz_concepto');
            $table->double('polz_importe', 15, 8);
            $table->boolean('polz_aprobado')->default(false);
            $table->boolean('polz_importada')->default(true);
            $table->boolean('polz_activo')->default(true);
            $table->boolean('polz_cierre')->default(false);
            $table->boolean('polz_modificada')->default(false);

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
        Schema::dropIfExists('polz');
    }
}
