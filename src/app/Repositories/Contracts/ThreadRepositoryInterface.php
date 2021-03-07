<?php


namespace App\Repositories\Contracts;


use Illuminate\Support\Collection;

interface ThreadRepositoryInterface
{
    public function getModel();

    public function all(): Collection;

    public function findBySlug(string $slug);

    public function findById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);
}
