<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente_nom')->nullable();
            $table->string('cliente_rfc')->nullable();
            $table->string('cliente_email')->nullable();
            $table->string('cliente_tel')->nullable();
            $table->string('cliente_forma_contab')->nullable();
            $table->string('cliente_concepto_polz')->nullable();
            $table->string('cliente_nom_contct')->nullable();
            $table->string('cliente_tel_contct')->nullable();
            $table->string('cliente_email_contct')->nullable();
            $table->string('cliente_nom_contct_otro')->nullable();
            $table->string('cliente_tel_contct_otro')->nullable();
            $table->string('cliente_email_contct_otro')->nullable();
           
            
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
        Schema::dropIfExists('cliente');
    }
}
