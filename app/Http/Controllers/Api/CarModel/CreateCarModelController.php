<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\CarModel;

use App\DTOs\CarModel\CreateCarModelDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\CarModel\CreateCarModelRequest;
use App\Http\Responses\ApiResponse;
use App\Managers\CarModel\CarModelManagerInterface;
use Illuminate\Http\JsonResponse;

final class CreateCarModelController extends AbstractApiController
{
    public function __invoke(CreateCarModelRequest $request, CarModelManagerInterface $manager): JsonResponse
    {
        $dto = new CreateCarModelDTO($request->validated());

        $carModel = $manager->create($dto);

        return ApiResponse::success($carModel->toArray());
    }
}