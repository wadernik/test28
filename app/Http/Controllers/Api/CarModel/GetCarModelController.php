<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\CarModel;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Responses\ApiResponse;
use App\Repositories\CarModel\CarModelRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetCarModelController extends AbstractApiController
{
    public function __invoke(
        int $id,
        CarModelRepositoryInterface $repository
    ): JsonResponse
    {
        if (!$this->isAllowed('models.view')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        if (!$carModel = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success($carModel->toArray());
    }
}