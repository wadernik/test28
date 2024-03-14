<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Responses\ApiResponse;
use App\Service\User\Favorite\UserFavoriteCarsRetrieverInterface;
use Illuminate\Http\JsonResponse;
use function count;

final class ListUserCarFavoritesController extends AbstractApiController
{
    public function listAll(): JsonResponse
    {
        $items = $this->user()->favorites->toArray();

        return ApiResponse::success(data: $items, total: count($items));
    }

    public function list(UserFavoriteCarsRetrieverInterface $repository): JsonResponse
    {
        $items = $repository->get($this->userId())->toArray();

        return ApiResponse::success(data: $items, total: count($items));
    }
}