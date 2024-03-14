<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Manufacturer;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Responses\ApiResponse;
use App\Managers\Manufacturer\ManufacturerManagerInterface;
use App\Repositories\Manufacturer\ManufacturerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class DeleteManufacturerController extends AbstractApiController
{
    public function __invoke(
        int $id,
        ManufacturerRepositoryInterface $repository,
        ManufacturerManagerInterface $manager
    ): JsonResponse
    {
        if (!$this->isAllowed('manufacturers.delete')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        if (!$manufacturer = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        $manager->delete($manufacturer);

        return ApiResponse::success($manufacturer->toArray());
    }
}