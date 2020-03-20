<?php

namespace App\Repositories\Contracts;

interface JabatanContract
{
    public function getAll();

    public function datatableWith($select, array $data);

    public function get($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);
}