<?php

namespace App\Contracts\Repositories;

use App\Models\User as Model;

interface UserRepositoryContract
{
    /**
     * Saves data.
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Find user by login
     * @param string $login
     * @return Model|null
     */
    public function findByLogin(string $login): ?Model;
}
