<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractApiController
 *
 * @package App\Http\Controllers\Api
 */
abstract class AbstractApiController extends Controller
{
    /**
     * Retourne une resource simple
     *
     * @param null  $payload
     * @param int   $status code 200 par défaut
     * @param array $headers
     * @param int   $options
     * @return JsonResponse
     */
    public function respond($payload = null, int $status = Response::HTTP_OK, array $headers = [], int $options = 0): JsonResponse
    {
        return new JsonResponse([
            'success' => true,
            'payload' => $payload,
        ], $status, $headers, $options);
    }

    /**
     * Retourne seulement une code HTTP, sans données
     *
     * @param int   $status code 204 par défaut
     * @param array $headers
     * @param int   $options
     * @return JsonResponse
     */
    public function respondEmpty(int $status = Response::HTTP_NO_CONTENT, array $headers = [], int $options = 0): JsonResponse
    {
        return new JsonResponse(null, $status, $headers, $options);
    }
}
