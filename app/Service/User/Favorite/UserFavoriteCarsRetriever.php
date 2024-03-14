<?php

declare(strict_types=1);

namespace App\Service\User\Favorite;

use App\Repositories\Car\FindAllByIdsInterface;
use App\Repositories\UserCarFavorite\FindAllByUserIdInterface;
use Illuminate\Support\Collection;
use function collect;

final class UserFavoriteCarsRetriever implements UserFavoriteCarsRetrieverInterface
{
    public function __construct(
        private readonly FindAllByUserIdInterface $favoritesRepository,
        private readonly FindAllByIdsInterface $carRepository,
    )
    {
    }

    public function get(int $userId): Collection
    {
        $favorites = $this->favoritesRepository->findAllByUserId($userId);

        if ($favorites->isEmpty()) {
            return collect();
        }

        $carIds = $favorites->pluck('car_id')->unique()->toArray();

        return $this->carRepository->findAllByIds($carIds);
    }
}