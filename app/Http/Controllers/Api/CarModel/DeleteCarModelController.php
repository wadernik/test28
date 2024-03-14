<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\CarModel;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Responses\ApiResponse;
use App\Managers\CarModel\CarModelManagerInterface;
use App\Repositories\CarModel\CarModelRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class DeleteCarModelController extends AbstractApiController
{
    public function __invoke(
        int $id,
        CarModelRepositoryInterface $repository,
        CarModelManagerInterface $manager
    ): JsonResponse
    {
        if (!$this->isAllowed('models.delete')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        if (!$carModel = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        $manager->delete($carModel);

        return ApiResponse::success($carModel->toArray());
    }
}