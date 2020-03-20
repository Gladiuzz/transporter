<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';

    protected $dates = ['tanggal'];

    protected $fillable = [
        'nomor_invoice',
        'tanggal',
        'perusahaan_asal',
        'alamat_asal',
        'kota_asal_id',
        'provinsi_asal_id',
        'nomor_telepon_asal',
        'kode_pos_asal',
        'negara_asal',

        'perusahaan_tujuan',
        'alamat_tujuan',
        'kota_tujuan_id',
        'provinsi_tujuan_id',
        'kode_pos_tujuan',
        'nomor_telepon_tujuan',
        'negara_tujuan',

        'jalur',
        'paket',
        'jenis_barang',
        'harga',

        'jenis_berat',
        
        'berat',
        'panjang',
        'lebar',
        'tinggi',

        'asuransi',
        'koli',
        'sub_charge',
        'ongkos_kirim'
    ];

    public function kotaAsal()
    {
        return $this->belongsTo('App\Models\Kota', 'kota_asal_id', 'id');
    }

    public function provinsiAsal()
    {
        return $this->belongsTo('App\Models\Provinsi', 'provinsi_asal_id', 'id');
    }

    public function kotaTujuan()
    {
        return $this->belongsTo('App\Models\Kota', 'kota_tujuan_id', 'id');
    }

    public function provinsiTujuan()
    {
        return $this->belongsTo('App\Models\Provinsi', 'provinsi_tujuan_id', 'id');
    }
}
