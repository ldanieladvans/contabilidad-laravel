<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipprov extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipprov', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipprov_desc')->nullable();
            $table->string('tipprov_concpto_polz')->nullable();
            $table->boolean('tipprov_defecto')->default(false)->nullable();
           
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
        Schema::dropIfExists('tipprov');
    }
}
