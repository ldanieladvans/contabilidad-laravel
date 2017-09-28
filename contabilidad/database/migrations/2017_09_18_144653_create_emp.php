<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Información general de la empresa
    public function up()
    {
         Schema::create('emp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_rfc');
            $table->string('emp_nom');
            $table->string('emp_form_cta')->nullable();
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
        Schema::dropIfExists('emp');
    }
}
