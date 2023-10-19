<?php

namespace App\Contracts\Services;

use App\Http\Resources\API\User\LoginResource;
use App\Models\User as Model;

interface UserServiceContract
{

    /**
     * Registers a user.
     * @param array $data
     * @return Model|null
     */
    public function register(array $data): ?Model;

    /**
     * Authorizes the user.
     * @param array $data
     * @return LoginResource|null
     */
    public function login(array $data): ?LoginResource;
}
