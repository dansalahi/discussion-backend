<?php


namespace App\Repositories;


use App\Repositories\Contracts\ThreadRepositoryInterface;
use App\Thread;
use Illuminate\Support\Collection;

class EloquentThreadRepository implements ThreadRepositoryInterface
{
    public function getModel(): \Illuminate\Database\Eloquent\Builder
    {
        return Thread::query();
    }

    public function all(): Collection
    {
        return $this->getModel()->whereStatus(1)->latest()->get();
    }

    public function findById(int $id)
    {
        return $this->getModel()->find($id);
    }

    public function findBySlug(string $slug)
    {
        return $this->getModel()->whereSlug($slug)->whereStatus(1)->first();
    }

    public function create($data)
    {
        return $this->getModel()->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->getModel()->find($id)->update($data);
    }

    public function destroy(int $id): ?bool
    {
        return $this->getModel()->findOrFail($id)->delete();
    }


}
