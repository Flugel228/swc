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

    public function register(array $data): bool
    {
        $user = $this->getUserRepository()->findByLogin($data['login']);
        if ($user) {
            return false;
        } else {
            $data['registration_date'] = now();
            $this->getUserRepository()->create($data);
            return true;
        }
    }

    public function login(array $data): ?LoginResource
    {
        if (Auth::attempt($data)) {
            $user = $this->getUserRepository()->findByLogin($data['login']);
            auth()->login($user);
            return LoginResource::make($user);
        }
        return null;
    }

    /**
     * @return UserRepositoryContract
     */
    public function getUserRepository(): UserRepositoryContract
    {
        return $this->userRepository;
    }
}
