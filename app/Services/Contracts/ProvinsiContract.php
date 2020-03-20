<?php

namespace App\Services\Contracts;

interface ProvinsiContract
{
    public function getAll();
    
    public function get($id);
}