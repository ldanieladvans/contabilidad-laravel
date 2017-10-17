<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('usrc_nick',100)->nullable();
            $table->string('usrc_tel',15)->nullable();
            $table->boolean('usrc_activo')->default(1);
            $table->string('usrc_pic')->nullable();
            $table->string('usrc_type',3)->default('app');
            $table->boolean('pass_changed')->default(0);
            $table->integer('users_cuentaid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
