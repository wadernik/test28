<?php

declare(strict_types=1);

namespace App\Repositories\CarModel;

use App\Models\CarModel\CarModel;
use Illuminate\Database\Eloquent\Collection;

final class CarModelRepository implements CarModelRepositoryInterface
{
    public function findAll(
        array $attributes = ['*'],
        array $sort = [],
        ?string $limit = null,
        ?string $offset = null
    ): Collection
    {
        $query = CarModel::query();

        if ($sort) {
            $query->orderBy($sort['sort'] ?? 'id', ($sort['order'] ?? 'asc') === 'desc' ? 'desc' : 'asc');
        }

        if ($limit) {
            $query->limit((int) $limit);
        }

        if ($offset && $limit) {
            $query->offset((int) $limit * ((int) $offset - 1));
        }

        return $query->get($attributes);
    }

    public function findOneById(int $id): ?CarModel
    {
        /** @var CarModel $carModel */
        $carModel = CarModel::query()->find($id);

        return $carModel;
    }

    public function count(): int
    {
        return CarModel::query()->count();
    }
}