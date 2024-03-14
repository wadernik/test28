<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Car;

use App\DTOs\Car\CarDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Http\Responses\ApiResponse;
use App\Managers\Car\CarManagerInterface;
use App\Repositories\Car\CarRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class UpdateCarController extends AbstractApiController
{
    public function __invoke(
        int $id,
        UpdateCarRequest $request,
        CarRepositoryInterface $repository,
        CarManagerInterface $manager
    ): JsonResponse
    {
        if (!$car = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        $dto = new CarDTO($request->validated());

        $car = $manager->update($car, $dto);

        return ApiResponse::success($car->toArray());
    }
}