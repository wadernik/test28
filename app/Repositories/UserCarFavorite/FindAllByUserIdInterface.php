<?php

declare(strict_types=1);

namespace App\Repositories\UserCarFavorite;

use App\Models\Favorite\UserCarFavorite;
use Illuminate\Database\Eloquent\Collection;

interface FindAllByUserIdInterface
{
    /**
     * @param int         $userId
     * @param array       $sort
     * @param string|null $limit
     * @param string|null $offset
     *
     * @return Collection<UserCarFavorite>
     */
    public function findAllByUserId(
        int $userId,
        array $sort = [],
        ?string $limit = null,
        ?string $offset = null
    ): Collection;
}