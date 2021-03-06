<?php

namespace App\Services\Contracts;

interface PengirimanContract
{
    public function getAll();

    public function datatable($select);

    public function store($request);

    public function delete($id);

    public function get($id);
}