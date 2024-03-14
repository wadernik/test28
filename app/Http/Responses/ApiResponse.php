<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use function array_merge;
use function response;

final class ApiResponse implements ApiResponseInterface
{
    public static function success(
        array $data = [],
        int $total = null,
        int $code = Response::HTTP_OK,
        array $headers = []
    ): JsonResponse {
        $dataResponse = $total === null
            ? $data
            : ['items' => $data, 'total' => $total];

        return response()->json(
            data: $dataResponse,
            status: $code,
            headers: $headers
        );
    }

    public static function error(
        int $code,
        string $message = null,
        array $data = [],
        array $headers = []
    ): JsonResponse {
        return response()->json(
            data: array_merge(
                [
                    'status' => 'Error',
                    'message' => $message,
                ],
                $data,
            ),
            status: $code,
            headers: $headers
        );
    }
}