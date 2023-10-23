<?php

namespace App\Services;


use App\Contracts\Repositories\UserRepositoryContract;
use App\Contracts\Services\UserServiceContract;
use App\Http\Resources\API\User\LoginResource;
use App\Models\User as Model;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceContract
{
    public function __construct(
        private readonly UserRepositoryContract $userRepository,
    )
    {
    }

    public function register(array $data): ?string
    {
        $user = $this->getUserRepository()->findByLogin($data['login']);
        if ($user) {
            return null;
        } else {
            $data['registration_date'] = now();
            $user = $this->getUserRepository()->create($data);
            return auth()->tokenById($user->id);
        }
    }

    public function login(array $data): ?string
    {
        if (! $token = auth()->attempt($data)) {
            return null;
        }
        return $token;
    }

    /**
     * @return UserRepositoryContract
     */
    public function getUserRepository(): UserRepositoryContract
    {
        return $this->userRepository;
    }
}
