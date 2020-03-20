<?php

namespace App\Repositories;

use App\Models\Provinsi;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\ProvinsiContract;

class ProvinsiRepository extends BaseRepository implements ProvinsiContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Provinsi $provinsi)
    {
        $this->model = $provinsi;
    }
}