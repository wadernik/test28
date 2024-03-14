<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Car;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Responses\ApiResponse;
use App\Repositories\Car\CarRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetCarController extends AbstractApiController
{
    public function __invoke(int $id, CarRepositoryInterface $repository): JsonResponse
    {
        if (!$car = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success($car->toArray());
    }
}