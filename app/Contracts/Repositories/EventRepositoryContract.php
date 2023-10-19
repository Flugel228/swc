<?php

namespace App\Contracts\Repositories;

use App\Models\Event as Model;

interface EventRepositoryContract
{
    /**
     * Saves data.
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

}
