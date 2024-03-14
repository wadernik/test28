<?php

declare(strict_types=1);

namespace App\Service\User\Favorite;

use App\Checker\AllCarsExistCheckerInterface;
use App\DTOs\UserCarFavorite\UserCarFavoriteDTOInterface;
use App\Models\User\User;
use RuntimeException;
use function collect;

final class UserCarFavoriteUpdaterService implements UserCarFavoriteUpdaterServiceInterface
{
    public function __construct(private readonly AllCarsExistCheckerInterface $checker)
    {
    }

    public function manage(User $user, UserCarFavoriteDTOInterface $favoriteDTO): User
    {
        $cars = collect($favoriteDTO->toArray())->pluck('id')->toArray();

        if (!$this->checker->check($cars)) {
            throw new RuntimeException();
        }

        $user->favorites()->sync($cars);

        return $user;
    }
}