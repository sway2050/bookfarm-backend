<?php

namespace App\Services\Interfaces;

interface BookServiceInterface
{
    public function list($dataTableParams);

    public function find($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}
