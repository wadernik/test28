<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\CarModel;

use App\DTOs\CarModel\UpdateCarModelDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\CarModel\UpdateCarModelRequest;
use App\Http\Responses\ApiResponse;
use App\Managers\CarModel\CarModelManagerInterface;
use App\Repositories\CarModel\CarModelRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class UpdateCarModelController extends AbstractApiController
{
    public function __invoke(
        int $id,
        UpdateCarModelRequest $request,
        CarModelRepositoryInterface $repository,
        CarModelManagerInterface $manager
    ): JsonResponse
    {
        if (!$carModel = $repository->findOneById($id)) {
            return ApiResponse::error(Response::HTTP_NOT_FOUND);
        }

        $dto = new UpdateCarModelDTO($request->validated());

        $carModel = $manager->update($carModel, $dto);

        return ApiResponse::success($carModel->toArray());
    }
}