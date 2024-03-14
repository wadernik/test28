<?php

declare(strict_types=1);

namespace App\Managers\CarModel;

use App\DTOs\CarModel\CarModelDTOInterface;
use App\Models\CarModel\CarModel;

interface CarModelCreatorInterface
{
    public function create(CarModelDTOInterface $carModelDTO): CarModel;
}