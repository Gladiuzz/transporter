<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasKecil extends Model
{
    protected $table = 'kas_kecil';

    protected $fillable = [
        'keterangan',
        'tanggal',
        'debit',
        'kredit'
    ];

    protected $dates =  ['tanggal'];
}
