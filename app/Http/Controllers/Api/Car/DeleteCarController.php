<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Car;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Responses\ApiResponse;
use App\Managers\Car\CarManagerInterface;
use App\Repositories\Car\CarRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class DeleteCarController extends AbstractApiController
{
    public function __invoke(int $id, CarRepositoryInterface $repository, CarManagerInterface $manager): JsonResponse
    {
        if (!$this->isAllowed('cars.delete')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        if (!$car = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        $manager->delete($car);

        return ApiResponse::success($car->toArray());
    }
}