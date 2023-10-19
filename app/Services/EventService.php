<?php

namespace App\Services;

use App\Contracts\Repositories\EventRepositoryContract;
use App\Contracts\Services\EventServiceContract;

class EventService implements EventServiceContract
{
    public function __construct(
        private readonly EventRepositoryContract $eventRepository,
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function store(array $data): void
    {
        $data['created_at'] = now();
        $this->getEventRepository()->create($data);
    }

    /**
     * @return EventRepositoryContract
     */
    public function getEventRepository(): EventRepositoryContract
    {
        return $this->eventRepository;
    }
}
