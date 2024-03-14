<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Manufacturer;

use App\DTOs\Manufacturer\UpdateManufacturerDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\Manufacturers\UpdateManufacturerRequest;
use App\Http\Responses\ApiResponse;
use App\Managers\Manufacturer\ManufacturerManagerInterface;
use App\Repositories\Manufacturer\ManufacturerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class UpdateManufacturerController extends AbstractApiController
{
    public function __invoke(
        int $id,
        UpdateManufacturerRequest $request,
        ManufacturerRepositoryInterface $repository,
        ManufacturerManagerInterface $manager
    ): JsonResponse
    {
        if (!$manufacturer = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        $dto = new UpdateManufacturerDTO($request->validated());

        $manufacturer = $manager->update($manufacturer, $dto);

        return ApiResponse::success($manufacturer->toArray());
    }
}