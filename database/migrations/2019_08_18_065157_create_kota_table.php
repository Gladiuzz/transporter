<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('provinsi_id')->unsigned();
            $table->string('type');
            $table->string('nama');
            $table->string('kode_pos');
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
        Schema::dropIfExists('kota');
    }
}
