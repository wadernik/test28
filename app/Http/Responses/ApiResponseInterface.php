<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

interface ApiResponseInterface
{
    public static function success(
        array $data = [],
        int $total = 0,
        int $code = Response::HTTP_OK,
        array $headers = []
    ): JsonResponse;

    public static function error(
        int $code,
        string $message = null,
        array $data = [],
        array $headers = []
    ): JsonResponse;
}