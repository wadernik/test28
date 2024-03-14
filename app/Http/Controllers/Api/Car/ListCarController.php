<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Car;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\Car\ListCarRequest;
use App\Http\Responses\ApiResponse;
use App\Repositories\Car\CarRepositoryInterface;
use Illuminate\Http\JsonResponse;

final class ListCarController extends AbstractApiController
{
    public function __invoke(ListCarRequest $request, CarRepositoryInterface $repository): JsonResponse
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