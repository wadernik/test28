<?php

declare(strict_types=1);

namespace App\Service\User\Favorite;

use App\Models\Car\Car;
use Illuminate\Support\Collection;

interface UserFavoriteCarsRetrieverInterface
{
    /**
     * @param int $userId
     *
     * @return Collection<Car>
     */
    public function get(int $userId): Collection;
}