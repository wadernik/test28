<?php

declare(strict_types=1);

namespace App\Repositories\CarModel;

use App\Models\CarModel\CarModel;

interface FindOneByIdInterface
{
    public function findOneById(int $id): ?CarModel;
}