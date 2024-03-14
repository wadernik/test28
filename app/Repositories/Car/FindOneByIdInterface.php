<?php

declare(strict_types=1);

namespace App\Repositories\Car;

use App\Models\Car\Car;

interface FindOneByIdInterface
{
    public function findOneById(int $id): ?Car;
}