<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/users/register",
 *     summary="User registration",
 *     tags={"User"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="login", type="string", example="SomeLogin"),
 *                     @OA\Property(property="password", type="string", example="password123"),
 *                     @OA\Property(property="first_name", type="string", example="Michael"),
 *                     @OA\Property(property="last_name", type="string", example="Philips"),
 *                     @OA\Property(property="birthdate", type="date", example="14.02.2004"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="Registered",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="null", example="null"),
 *             @OA\Property(property="result", type="object",
 *                 @OA\Property(property="message", type="string", example="Вы успешно зарегестрировались!")
 *             ),
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=409,
 *         description="This user already exists!",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="Пользователь с таким логином уже существует")
 *             ),
 *             @OA\Property(property="result", type="null", example="null"),
 *         )
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/users/login",
 *     summary="Login",
 *     tags={"User"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="login", type="string", example="SomeLogin"),
 *                     @OA\Property(property="password", type="string", example="password123"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Logged In",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="null", example="null"),
 *             @OA\Property(property="result", type="object",
 *                 @OA\Property(property="message", type="string", example="Вы успешно вошли в аккаунт!")
 *             ),
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=401,
 *         description="User is not found!",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="Логин или пароль были введены неверно!")
 *             ),
 *             @OA\Property(property="result", type="null", example="null"),
 *         )
 *     ),
 * ),
 */
class UserController extends Controller
{
}
