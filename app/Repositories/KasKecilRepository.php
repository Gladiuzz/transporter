<?php

namespace App\Repositories;

use App\Models\KasKecil;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\KasKecilContract;

class KasKecilRepository extends BaseRepository implements KasKecilContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * @param KasKecil $kasKecil
     */
    public function __construct(KasKecil $kasKecil)
    {
        $this->model = $kasKecil;
    }

    public function totalKredit()
    {
        return $this->model->sum('kredit');
    }

    public function totalDebit()
    {
        return $this->model->sum('debit');
    }
}