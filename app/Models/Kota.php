<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $fillable = ['provinsi_id', 'type', 'nama', 'kode_pos'];
}
