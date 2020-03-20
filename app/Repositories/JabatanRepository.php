<?php

namespace App\Repositories;

use App\Models\Jabatan;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\JabatanContract;

class JabatanRepository extends BaseRepository implements JabatanContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * @param Jabatan $jabatan
     */
    public function __construct(Jabatan $jabatan)
    {
        $this->model = $jabatan->orderBy('id', 'DESC');
    }
}