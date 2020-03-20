<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasKecilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_kecil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keterangan');
            $table->date('tanggal');
            $table->double('debit')->default(0);
            $table->double('kredit')->default(0);
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
        Schema::dropIfExists('kas_kecil');
    }
}
