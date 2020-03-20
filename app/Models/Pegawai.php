<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nip',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_perkawinan',
        'nomor_telepon',
        'provinsi_id',
        'kota_id',
        'jabatan_id',
        'alamat'
    ];

    protected $dates = ['tanggal_lahir'];

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi');
    }

    public function kota()
    {
        return $this->belongsTo('App\Models\Kota');
    }
}
