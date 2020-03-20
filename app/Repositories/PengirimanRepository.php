<?php

namespace App\Repositories;

use App\Models\Pengiriman;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\PengirimanContract;

class PengirimanRepository extends BaseRepository implements PengirimanContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * @param Pengiriman $pengiriman
     */
    public function __construct(Pengiriman $pengiriman)
    {
        $this->model = $pengiriman->orderBy('id', 'DESC');
    }
}