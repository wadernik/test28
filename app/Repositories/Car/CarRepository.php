<?php

declare(strict_types=1);

namespace App\Repositories\Car;

use App\Models\Car\Car;
use Illuminate\Database\Eloquent\Collection;

final class CarRepository implements CarRepositoryInterface
{
    public function findAll(
        array $attributes = ['*'],
        array $sort = [],
        ?string $limit = null,
        ?string $offset = null
    ): Collection
    {
        $query = Car::query();

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

    public function findAllByIds(array $carIds): Collection
    {
        return Car::query()
            ->whereIn('id', $carIds)
            ->get();
    }

    public function findOneById(int $id): ?Car
    {
        /** @var Car $car */
        $car = Car::query()->find($id);

        return $car;
    }

    public function count(): int
    {
        return Car::query()->count();
    }
}