<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\DTOs\UserCarFavorite\UserCarFavoriteDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\User\Favorite\UpdateUserCarFavoriteRequest;
use App\Http\Responses\ApiResponse;
use App\Service\User\Favorite\UserCarFavoriteUpdaterServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ManageUserCarFavoritesController extends AbstractApiController
{
    public function __invoke(
        UpdateUserCarFavoriteRequest $request,
        UserCarFavoriteUpdaterServiceInterface $manager
    ): JsonResponse
    {
        if (!$this->isAllowed('favorites.edit')) {
            return ApiResponse::error(Response::HTTP_FORBIDDEN);
        }

        $dto = new UserCarFavoriteDTO($request->validated());

        $manager->manage($this->user(), $dto);

        return ApiResponse::success();
    }
}