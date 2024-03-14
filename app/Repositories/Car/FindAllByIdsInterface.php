<?php

declare(strict_types=1);

namespace App\Repositories\Car;

use App\Models\Car\Car;
use Illuminate\Database\Eloquent\Collection;

interface FindAllByIdsInterface
{
    /**
     * @param array<int> $carIds
     *
     * @return Collection<Car>
     */
    public function findAllByIds(array $carIds): Collection;
}