<?php

namespace App\Contracts\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface EventServiceContract
{
    public function index(): array;

    /**
     * Create an event
     * @param array $data
     * @return void
     */
    public function store(array $data): void;

    public function addParticipant(int $id): void;

    public function deleteParticipant(int $id): void;

    public function destroy(int $id): bool;
}
