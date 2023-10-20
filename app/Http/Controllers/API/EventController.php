<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\EventServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Event\StoreRequest;

class EventController extends Controller
{
    public function __construct(
        private readonly EventServiceContract $service,
    )
    {
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $response = $this->getService()->index();
        return response()->json([
            'error' => null,
            'result' => $response
        ]);
    }

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

    public function destroy(int $id)
    {
        $response = $this->getService()->destroy($id);
        if ($response) {
            return response()->json([
                'error' => null,
                'result' => [
                    'message' => 'Событие успешно удалено.',
                ],
            ]);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'Вы не являетесь создателем этого события.'
                ],
                'result' => null,
            ], 403);
        }
    }

    public function addParticipant(int $id): \Illuminate\Http\JsonResponse
    {
        $this->getService()->addParticipant($id);
        return response()->json([
            'error' => null,
            'result' => [
                'message' => 'Вы стали участником события!',
            ],
        ]);
    }

    public function deleteParticipant(int $id): \Illuminate\Http\JsonResponse
    {
        $this->getService()->deleteParticipant($id);
        return response()->json([
            'error' => null,
            'result' => [
                'message' => 'Вы перестали быть участником события!',
            ],
        ]);
    }

    /**
     * @return EventServiceContract
     */
    public function getService(): EventServiceContract
    {
        return $this->service;
    }
}
