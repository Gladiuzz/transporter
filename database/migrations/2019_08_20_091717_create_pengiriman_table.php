<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_invoice');
            $table->date('tanggal');
            $table->string('perusahaan_asal');
            $table->text('alamat_asal');
            $table->bigInteger('kota_asal_id')->unsigned();
            $table->bigInteger('provinsi_asal_id')->unsigned();
            $table->string('nomor_telepon_asal');
            $table->string('kode_pos_asal');
            $table->string('negara_asal');

            $table->string('perusahaan_tujuan');
            $table->text('alamat_tujuan');
            $table->bigInteger('kota_tujuan_id')->unsigned();
            $table->bigInteger('provinsi_tujuan_id')->unsigned();
            $table->string('nomor_telepon_tujuan');
            $table->string('kode_pos_tujuan');
            $table->string('negara_tujuan');

            $table->tinyInteger('jalur'); // 0 = udara, 1 = darat, 2 = laut
            $table->tinyInteger('paket'); // 0 = reguler, 1 = express
            $table->string('jenis_barang'); 
            $table->double('harga');

            $table->boolean('jenis_berat');

            $table->float('berat');
            $table->float('panjang')->nullable();
            $table->float('lebar')->nullable();
            $table->float('tinggi')->nullable();

            $table->double('asuransi')->nullable();
            $table->float('koli');
            $table->float('sub_charge');
            $table->double('ongkos_kirim');
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
        Schema::dropIfExists('pengiriman');
    }
}
