<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomdet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomdet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomdet_tipoconc')->nullable();
            $table->string('nomdet_codsat')->nullable();
            $table->string('nomdet_clave_emp')->nullable();
            $table->string('nomdet_concpto')->nullable();
            $table->double('nomdet_imp_grav', 15, 8);
            $table->double('nomdet_imp_exent', 15, 8);
            $table->double('nomdet_imp', 15, 8);
            $table->double('nomdet_tipo_incapac', 15, 8);
            $table->integer('nomdet_nom_id')->unsigned();
            $table->foreign('nomdet_nom_id')->references('id')->on('nom')->onDelete('cascade');
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
        Schema::dropIfExists('nomdet');
    }
}
