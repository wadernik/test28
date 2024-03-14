<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Responses\ApiResponse;
use App\Service\User\Favorite\UserFavoriteCarsRetrieverInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use function count;

final class ListUserCarFavoritesController extends AbstractApiController
{
    public function listAll(): JsonResponse
    {
        if (!$this->isAllowed('favorites.view')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        return ApiResponse::success($this->user()->favorites()->toArray());
    }

    public function list(UserFavoriteCarsRetrieverInterface $repository): JsonResponse
    {
        if (!$this->isAllowed('favorites.view')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        $items = $repository->get($this->userId())->toArray();

        return ApiResponse::success(data: $items, total: count($items));
    }
}