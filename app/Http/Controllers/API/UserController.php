<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\UserServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\LoginRequest;
use App\Http\Requests\API\User\RegisterRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserServiceContract $service;

    public function __construct()
    {
        $this->service = app(UserServiceContract::class);
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $response = $this->getService()->register($data);
        if ($response) {
            return response()->json([
                'error' => null,
                'result' => [
                    'message' => 'Вы успешно зарегестрировались!',
                ],
            ], 201);
        } else {
            return response()->json([
               'error' => [
                   'message' => 'Пользователь с таким логином уже существует',
               ],
                'result' => null,
            ], 409);
        }
    }

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $response = $this->getService()->login($data);
        if ($response) {
            return response()->json([
                'error' => null,
                'result' => $response
            ]);
        } else {
            return response()->json([
                'error' => 'Логин или пароль были введены неверно!',
                'result' => null,
            ]);
        }
    }

    /**
     * @return UserServiceContract
     */
    public function getService(): UserServiceContract
    {
        return $this->service;
    }
}
