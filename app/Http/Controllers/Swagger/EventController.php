<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/events",
 *     summary="List of events",
 *     tags={"Event"},
 *
 *     @OA\Response(
 *         response="200",
 *         description="A list of events is provided.",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="null", example="null"),
 *             @OA\Property(property="result", type="object",
 *                  @OA\Property(property="data", type="array",
 *                      @OA\Items(
 *                          @OA\Property(property="id", type="integer", example="1"),
 *                          @OA\Property(property="title", type="string", example="Some title"),
 *                          @OA\Property(property="text", type="string", example="Some text"),
 *                          @OA\Property(property="created_at", type="date", example="12.03.2015"),
 *                          @OA\Property(property="participants", type="array",
 *                              @OA\Items(
 *                                  @OA\Property(property="id", type="integer", example="1"),
 *                                  @OA\Property(property="first_name", type="string", example="Michael"),
 *                                  @OA\Property(property="last_name", type="string", example="Philips"),
 *                              )
 *                          )
 *                      )
 *                  ),
 *                  @OA\Property(property="meta", type="object",
 *                      @OA\Property(property="total", type="integer", example="1"),
 *                      @OA\Property(property="per_page", type="integer", example="10"),
 *                      @OA\Property(property="current_page", type="integer", example="1"),
 *                      @OA\Property(property="last_page", type="integer", example="1"),
 *                      @OA\Property(property="from", type="integer", example="1"),
 *                      @OA\Property(property="to", type="integer", example="2"),
 *                  ),
 *                  @OA\Property(property="links", type="object",
 *                      @OA\Property(property="first", type="string", example="http://localhost:8876/api/events?page=1"),
 *                      @OA\Property(property="last", type="string", example="http://localhost:8876/api/events?page=1"),
 *                      @OA\Property(property="prev", type="string", example="http://localhost:8876/api/events?page=1"),
 *                      @OA\Property(property="next", type="string", example="http://localhost:8876/api/events?page=2"),
 *                  )
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Post(
 *     path="/api/events",
 *     summary="Create an event",
 *     tags={"Event"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Some title"),
 *                     @OA\Property(property="text", type="string", example="Some text"),
 *                     @OA\Property(property="creator_id", type="integer", example="1"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="Created",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="null", example="null"),
 *             @OA\Property(property="result", type="object",
 *                 @OA\Property(property="message", type="string", example="Событие было успешно создано!")
 *             ),
 *         )
 *     ),
 * ),
 *
 * @OA\Delete(
 *     path="/api/events/{event}",
 *     summary="Delete an event",
 *     tags={"Event"},
 *
 *     @OA\Parameter(
 *         description="Event ID",
 *         in="path",
 *         name="event",
 *         required=true,
 *         example="1"
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Deleted",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="null", example="null"),
 *             @OA\Property(property="result", type="object",
 *                 @OA\Property(property="message", type="string", example="Событие успешно удалено.")
 *             ),
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=403,
 *         description="Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="Вы не являетесь создателем этого события.")
 *             ),
 *             @OA\Property(property="result", type="null", example="null"),
 *         )
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/events/{event}/participants",
 *     summary="Add participant",
 *     tags={"Event"},
 *
 *     @OA\Parameter(
 *         description="Event ID",
 *         in="path",
 *         name="event",
 *         required=true,
 *         example="1"
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Added",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="null", example="null"),
 *             @OA\Property(property="result", type="object",
 *                 @OA\Property(property="message", type="string", example="Вы стали участником события!")
 *             ),
 *         )
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/events/{event}/participants/delete",
 *     summary="Add participant",
 *     tags={"Event"},
 *
 *     @OA\Parameter(
 *         description="Event ID",
 *         in="path",
 *         name="event",
 *         required=true,
 *         example="1"
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Deleted",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="null", example="null"),
 *             @OA\Property(property="result", type="object",
 *                 @OA\Property(property="message", type="string", example="Вы перестали быть участником события!")
 *             ),
 *         )
 *     ),
 * ),
 */
class EventController extends Controller
{
}
