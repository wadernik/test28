<?php

declare(strict_types=1);

namespace App\Repositories\Manufacturer;

use App\Models\Manufacturer\Manufacturer;
use Illuminate\Database\Eloquent\Collection;

final class ManufacturerRepository implements ManufacturerRepositoryInterface
{
    public function findAll(
        array $attributes = ['*'],
        array $sort = [],
        ?string $limit = null,
        ?string $offset = null
    ): Collection
    {
        $query = Manufacturer::query();

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

    public function findOneById(int $id): ?Manufacturer
    {
        /** @var ?Manufacturer $manufacturer */
        $manufacturer = Manufacturer::query()->find($id);

        return $manufacturer;
    }

    public function count(): int
    {
        return Manufacturer::query()->count();
    }
}