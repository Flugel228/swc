<?php

namespace App\Contracts\Repositories;

use App\Models\Event as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface EventRepositoryContract
{
    public function findById(int $id): ?Model;

    /**
     * Get event collection
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator;

    /**
     * Saves data.
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    public function attachParticipant(array $data): void;

    public function syncParticipant(array $data): void;

    public function delete($id): void;
}
