<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Manufacturer;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Responses\ApiResponse;
use App\Repositories\Manufacturer\ManufacturerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetManufacturerController extends AbstractApiController
{
    public function __invoke(
        int $id,
        ManufacturerRepositoryInterface $repository,
    ): JsonResponse
    {
        if (!$this->isAllowed('manufacturers.view')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        if (!$manufacturer = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success($manufacturer->toArray());
    }
}