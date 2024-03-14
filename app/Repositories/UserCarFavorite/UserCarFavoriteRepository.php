<?php

declare(strict_types=1);

namespace App\Repositories\UserCarFavorite;

use App\Models\Favorite\UserCarFavorite;
use Illuminate\Database\Eloquent\Collection;

final class UserCarFavoriteRepository implements UserCarFavoriteRepositoryInterface
{
    public function findAllByUserId(
        int $userId,
        array $sort = [],
        ?string $limit = null,
        ?string $offset = null
    ): Collection
    {
        $query = UserCarFavorite::query()->where('user_id', $userId);

        if ($sort) {
            $query->orderBy($sort['sort'] ?? 'id', ($sort['order'] ?? 'asc') === 'desc' ? 'desc' : 'asc');
        }

        if ($limit) {
            $query->limit((int) $limit);
        }

        if ($offset && $limit) {
            $query->offset((int) $limit * ((int) $offset - 1));
        }

        return $query->get();
    }
}