<?php


namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

use App\User;

interface UserRepositoryInterface
{
    public function getModel();

    public function all(): Collection;

    public function findById(int $id);

    public function create($data);
}
