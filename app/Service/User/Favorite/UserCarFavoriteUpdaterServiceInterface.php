<?php

declare(strict_types=1);

namespace App\Service\User\Favorite;

use App\DTOs\UserCarFavorite\UserCarFavoriteDTOInterface;
use App\Models\User\User;
use RuntimeException;

interface UserCarFavoriteUpdaterServiceInterface
{
    /**
     * @param User                        $user
     * @param UserCarFavoriteDTOInterface $favoriteDTO
     *
     * @return User
     * @throws RuntimeException
     */
    public function manage(User $user, UserCarFavoriteDTOInterface $favoriteDTO): User;
}