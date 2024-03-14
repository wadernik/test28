<?php

declare(strict_types=1);

namespace App\Repositories\Manufacturer;

use App\Models\Manufacturer\Manufacturer;

interface FindOneByIdInterface
{
    public function findOneById(int $id): ?Manufacturer;
}