<?php

namespace App\Repositories;

use App\Contracts\Repositories\EventRepositoryContract;
use App\Models\Event as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EventRepository extends CoreRepository implements EventRepositoryContract
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function findById(int $id): ?Model
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @inheritDoc
     */
    public function paginate(): LengthAwarePaginator
    {
        return $this->startConditions()->paginate(10);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        return $this->startConditions()->create($data);
    }

    public function attachParticipant(array $data): void
    {
        $this->startConditions()
            ->find($data['event_id'])
            ->participants()
            ->attach($data['user_id']);
    }

    public function syncParticipant(array $data): void
    {
        $this->startConditions()
            ->find($data['event_id'])
            ->participants()
            ->detach([$data['user_id']]);
    }

    public function delete($id): void
    {
        $this->startConditions()->find($id)->delete();
    }
}
