<?php

declare(strict_types=1);

namespace App\Managers\Car;

use App\DTOs\Car\CarDTOInterface;
use App\Models\Car\Car;

interface CarUpdaterInterface
{
    public function update(Car $car, CarDTOInterface $carDTO): Car;
}