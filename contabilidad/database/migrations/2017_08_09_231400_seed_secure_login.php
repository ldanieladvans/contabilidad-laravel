<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedSecureLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_login', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('seed_secure',255)->nullable();
            $table->string('client_rfc',20)->nullable();
            $table->string('cta_rfc',20)->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sec_login', function (Blueprint $table) {
            //
        });
    }
}
