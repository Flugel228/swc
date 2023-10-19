<?php

namespace App\Repositories;

use App\Models\Event as Model;

class EventRepository extends CoreRepository implements \App\Contracts\Repositories\EventRepositoryContract
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        return $this->startConditions()->create($data);
    }
}
