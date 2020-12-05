<?php


namespace App\Repositories;


use App\Channel;
use App\Repositories\Contracts\ChannelRepositoryInterface;
use Illuminate\Support\Collection;

class EloquentChannelRepository implements ChannelRepositoryInterface
{

    public function getModel()
    {
        return Channel::query();
    }

    public function all(): Collection
    {
        return $this->getModel()->latest()->get();
    }

    public function findById(int $id)
    {
        return $this->getModel()->find($id);
    }

    public function create($data)
    {
        return $this->getModel()->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->getModel()->find($id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->getModel()->findOrFail($id)->delete();
    }
}
