<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip')->unique();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->boolean('jenis_kelamin');
            $table->string('nomor_telepon');
            $table->boolean('status_perkawinan');
            $table->text('alamat');
            $table->bigInteger('provinsi_id')->unsigned();
            $table->bigInteger('kota_id')->unsigned();
            $table->bigInteger('jabatan_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('provinsi_id')
                  ->references('id')
                  ->on('provinsi')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('kota_id')
                  ->references('id')
                  ->on('kota')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('jabatan_id')
                  ->references('id')
                  ->on('jabatan')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
