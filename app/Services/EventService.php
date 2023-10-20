<?php

namespace App\Services;

use App\Contracts\Repositories\EventRepositoryContract;
use App\Contracts\Services\EventServiceContract;
use App\Http\Resources\API\Event\IndexResource;

class EventService implements EventServiceContract
{
    public function __construct(
        private readonly EventRepositoryContract $eventRepository,
    )
    {
    }

    public function index(): array
    {
        $data = $this->getEventRepository()->paginate();
        $data = IndexResource::collection($data);
        return $response = [
            'data' => $data->items(), // Элементы на текущей странице
            'meta' => [
                'total' => $data->total(), // Общее количество элементов
                'per_page' => $data->perPage(), // Количество элементов на странице
                'current_page' => $data->currentPage(), // Текущая страница
                'last_page' => $data->lastPage(), // Последняя страница
                'from' => $data->firstItem(), // Номер первого элемента на текущей странице
                'to' => $data->lastItem(), // Номер последнего элемента на текущей странице
            ],
            'links' => [
                'first' => $data->url(1), // URL первой страницы
                'last' => $data->url($data->lastPage()), // URL последней страницы
                'prev' => $data->previousPageUrl(), // URL предыдущей страницы
                'next' => $data->nextPageUrl(), // URL следующей страницы
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function store(array $data): void
    {
        $data['created_at'] = now();
        $this->getEventRepository()->create($data);
    }

    public function addParticipant(int $id): void
    {
        $data = [
            'event_id' => $id,
            'user_id' => auth()->user()->id,
        ];
        $this->getEventRepository()->attachParticipant($data);
    }

    public function deleteParticipant(int $id): void
    {
        $data = [
            'event_id' => $id,
            'user_id' => auth()->user()->id,
        ];
        $this->getEventRepository()->syncParticipant($data);
    }

    public function destroy(int $id): bool
    {
        $user = auth()->user();
        $event = $this->getEventRepository()->findById($id);

        if ($event === null || $user->id !== $event->creator_id) {
            return false;
        }
        $this->getEventRepository()->delete($id);
        return true;
    }

    /**
     * @return EventRepositoryContract
     */
    public function getEventRepository(): EventRepositoryContract
    {
        return $this->eventRepository;
    }
}
