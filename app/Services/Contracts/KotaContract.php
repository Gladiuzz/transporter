<?php

namespace App\Services\Contracts;

interface KotaContract
{
    public function getAll();
    
    public function get($id);
}