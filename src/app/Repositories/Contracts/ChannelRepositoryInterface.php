<?php


namespace App\Repositories\Contracts;


use Illuminate\Support\Collection;

interface ChannelRepositoryInterface
{
    public function getModel();

    public function all(): Collection;

    public function findById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);
}
