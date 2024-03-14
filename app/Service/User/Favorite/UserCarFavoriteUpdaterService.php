<?php

declare(strict_types=1);

namespace App\Service\User\Favorite;

use App\DTOs\UserCarFavorite\UserCarFavoriteDTOInterface;
use App\Models\User\User;
use function collect;

final class UserCarFavoriteUpdaterService implements UserCarFavoriteUpdaterServiceInterface
{
    public function manage(User $user, UserCarFavoriteDTOInterface $favoriteDTO): User
    {
        $cars = collect($favoriteDTO->toArray())->pluck('id')->toArray();

        $user->favorites()->sync($cars);

        return $user;
    }
}