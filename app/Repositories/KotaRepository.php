<?php

namespace App\Repositories;

use App\Models\Kota;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\KotaContract;

class KotaRepository extends BaseRepository implements KotaContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Kota $kota)
    {
        $this->model = $kota;
    }
}