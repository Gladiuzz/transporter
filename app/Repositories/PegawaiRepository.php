<?php

namespace App\Repositories;

use App\Models\Pegawai;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\PegawaiContract;

class PegawaiRepository extends BaseRepository implements PegawaiContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * @param Pegawai $pegawai
     */
    public function __construct(Pegawai $pegawai)
    {
        $this->model = $pegawai->orderBy('id', 'DESC');
    }
}