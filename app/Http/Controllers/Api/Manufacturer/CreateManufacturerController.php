<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Manufacturer;

use App\DTOs\Manufacturer\CreateManufacturerDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\Manufacturers\CreateManufacturerRequest;
use App\Http\Responses\ApiResponse;
use App\Managers\Manufacturer\ManufacturerManagerInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CreateManufacturerController extends AbstractApiController
{
    public function __invoke(CreateManufacturerRequest $request, ManufacturerManagerInterface $manager): JsonResponse
    {
        if (!$this->isAllowed('manufacturers.edit')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        $dto = new CreateManufacturerDTO($request->validated());

        $manufacturer = $manager->create($dto);

        return ApiResponse::success($manufacturer->toArray());
    }
}