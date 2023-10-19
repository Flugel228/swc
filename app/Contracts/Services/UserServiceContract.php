<?php

namespace App\Contracts\Services;

use App\Http\Resources\API\User\LoginResource;
use App\Models\User as Model;

interface UserServiceContract
{

    /**
     * Registers a user.
     * @param array $data
     * @return bool
     */
    public function register(array $data): bool;

    /**
     * Authorizes the user.
     * @param array $data
     * @return LoginResource|null
     */
    public function login(array $data): ?LoginResource;
}
