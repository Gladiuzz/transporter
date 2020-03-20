<?php

namespace App\Services;

use App\Repositories\Contracts\KotaContract as KotaRepo;
use App\Services\Contracts\KotaContract;

class KotaService implements KotaContract
{
    protected $kotaRepo;

    public function __construct(KotaRepo $kotaRepo)
    {
        $this->kotaRepo = $kotaRepo;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->kotaRepo->getAll();
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
        return $this->kotaRepo->get($id);
    }
}
