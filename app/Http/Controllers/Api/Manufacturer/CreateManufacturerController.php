<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Manufacturer;

use App\DTOs\Manufacturer\CreateManufacturerDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\Manufacturers\CreateManufacturerRequest;
use App\Http\Responses\ApiResponse;
use App\Managers\Manufacturer\ManufacturerManagerInterface;
use Illuminate\Http\JsonResponse;

final class CreateManufacturerController extends AbstractApiController
{
    public function __invoke(CreateManufacturerRequest $request, ManufacturerManagerInterface $manager): JsonResponse
    {
        $dto = new CreateManufacturerDTO($request->validated());

        $manufacturer = $manager->create($dto);

        return ApiResponse::success($manufacturer->toArray());
    }
}