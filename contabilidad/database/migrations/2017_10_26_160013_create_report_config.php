<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_config', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('report_code')->nullable();
            $table->string('report_name')->nullable();
            $table->integer('report_tiposubcta_id')->unsigned()->nullable();
            $table->foreign('report_tiposubcta_id')->references('id')->on('tiposubcta')->onDelete('set null');
            $table->string('report_group')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_config');
    }
}
