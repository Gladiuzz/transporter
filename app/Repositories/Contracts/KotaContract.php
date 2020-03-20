<?php

namespace App\Repositories\Contracts;

interface KotaContract
{
    public function getAll();

    public function get($id);
}