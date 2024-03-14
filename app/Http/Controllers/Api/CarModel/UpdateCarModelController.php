<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\CarModel;

use App\DTOs\CarModel\CreateCarModelDTO;
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
        if (!$this->isAllowed('models.edit')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        $dto = new CreateCarModelDTO($request->validated());

        $carModel = $manager->create($dto);

        return ApiResponse::success($carModel->toArray());
    }
}