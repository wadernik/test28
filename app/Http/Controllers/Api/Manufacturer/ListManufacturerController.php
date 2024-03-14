<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Manufacturer;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\Manufacturers\ListManufacturerRequest;
use App\Http\Responses\ApiResponse;
use App\Repositories\Manufacturer\ManufacturerRepositoryInterface;
use Illuminate\Http\JsonResponse;

final class ListManufacturerController extends AbstractApiController
{
    public function __invoke(
        ListManufacturerRequest $request,
        ManufacturerRepositoryInterface $repository
    ): JsonResponse
    {
        $requestData = $request->validated();

        $sort = [
            'sort' => $requestData['sort'] ?? null,
            'order' => $requestData['order'] ?? null,
        ];
        $limit = $requestData['limit'] ?? null;
        $offset = $requestData['page'] ?? null;

        $items = $repository->findAll(sort: $sort, limit: $limit, offset: $offset);
        $total = $repository->count();

        return ApiResponse::success(data: $items->toArray(), total: $total);
    }
}