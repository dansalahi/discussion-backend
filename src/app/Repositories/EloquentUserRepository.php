<?php


namespace App\Repositories;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Collection;

class EloquentUserRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::query();
    }

    public function all(): Collection
    {
        // TODO: Implement all() method.
    }

    public function findById(int $id)
    {
        // TODO: Implement findById() method.
    }

    public function create($data)
    {
        return $this->getModel()->create($data);
    }
}
