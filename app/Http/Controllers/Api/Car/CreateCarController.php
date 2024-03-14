<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Car;

use App\DTOs\Car\CarDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\Car\CreateCarRequest;
use App\Http\Responses\ApiResponse;
use App\Managers\Car\CarManagerInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CreateCarController extends AbstractApiController
{
    public function __invoke(CreateCarRequest $request, CarManagerInterface $manager): JsonResponse
    {
        if (!$this->isAllowed('cars.edit')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        $dto = new CarDTO($request->validated());

        $car = $manager->create($dto);

        return ApiResponse::success($car->toArray());
    }
}