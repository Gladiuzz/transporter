<?php

namespace App\Services;

use App\Repositories\Contracts\ProvinsiContract as ProvinsiRepo;
use App\Services\Contracts\ProvinsiContract;

class ProvinsiService implements ProvinsiContract
{
    protected $provinsiRepo;

    public function __construct(ProvinsiRepo $provinsiRepo)
    {
        $this->provinsiRepo = $provinsiRepo;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->provinsiRepo->getAll();
    }

     /**
     * Get Data By ID
     *
     * @param $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->provinsiRepo->get($id);
    }
}
