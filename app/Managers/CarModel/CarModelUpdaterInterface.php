<?php

declare(strict_types=1);

namespace App\Managers\CarModel;

use App\DTOs\CarModel\CarModelDTOInterface;
use App\Models\CarModel\CarModel;

interface CarModelUpdaterInterface
{
    public function update(CarModel $carModel, CarModelDTOInterface $carModelDTO): CarModel;
}