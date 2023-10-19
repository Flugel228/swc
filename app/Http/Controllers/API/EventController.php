<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\EventServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Event\StoreRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(
        private readonly EventServiceContract $service,
    )
    {}

    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $this->getService()->store($data);
        return response()->json([
            'error' => null,
            'result' => [
                'message' => 'Событие было успешно создано!',
            ],
        ], 201);
    }

    /**
     * @return EventServiceContract
     */
    public function getService(): EventServiceContract
    {
        return $this->service;
    }
}
