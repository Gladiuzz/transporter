<?php

namespace App\Repositories\Contracts;

interface ProvinsiContract
{
    public function getAll();

    public function get($id);
}