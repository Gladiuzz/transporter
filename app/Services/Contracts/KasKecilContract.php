<?php

namespace  App\Services\Contracts;

interface KasKecilContract
{
    public function getAll();

    public function datatable($select);

    public function store($request);

    public function update($request, $id);

    public function delete($id);

    public function get($id);
}