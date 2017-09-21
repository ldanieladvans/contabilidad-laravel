<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveed', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proveed_nom')->nullable();
            $table->string('proveed_rfc')->nullable();
            $table->string('proveed_email')->nullable();
            $table->string('proveed_tel')->nullable();
            $table->string('proveed_forma_contab')->nullable();
            $table->string('proveed_concepto_polz')->nullable();
            $table->string('proveed_nom_contct')->nullable();
            $table->string('proveed_tel_contct')->nullable();
            $table->string('proveed_email_contct')->nullable();
            $table->string('proveed_nom_contct_otro')->nullable();
            $table->string('proveed_tel_contct_otro')->nullable();
            $table->string('proveed_email_contct_otro')->nullable();
           
            
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
        Schema::dropIfExists('proveed');
    }
}
