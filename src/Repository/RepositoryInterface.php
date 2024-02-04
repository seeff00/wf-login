<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function insert($data);
    public function update($data);
    public function delete($id);
}