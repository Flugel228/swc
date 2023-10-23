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
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $response = $this->getService()->register($data);
        if ($response) {
            $token = $this->respondWithToken($response);
            return response()->json([
                'error' => null,
                'result' => [
                    'token' => $token,
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
            $token = $this->respondWithToken($response);
            return response()->json([
                'error' => null,
                'result' => [
                    'token' => $token,
                    'message' => 'Вы успешно вошли в аккаунт!',
                ]
            ]);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'Логин или пароль были введены неверно!',
                ],
                'result' => null,
            ], 401);
        }
    }

    public function me(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'error' => null,
            'result' => auth()->user()
        ]);
    }

    protected function respondWithToken($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    /**
     * @return UserServiceContract
     */
    public function getService(): UserServiceContract
    {
        return $this->service;
    }
}
