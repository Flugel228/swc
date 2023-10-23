<?php

namespace App\Contracts\Services;

interface UserServiceContract
{

    /**
     * Registers a user.
     * @param array $data
     * @return string|null
     */
    public function register(array $data): ?string;

    /**
     * Authorizes the user.
     * @param array $data
     * @return string|null
     */
    public function login(array $data): ?string;
}
