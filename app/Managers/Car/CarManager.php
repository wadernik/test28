<?php

declare(strict_types=1);

namespace App\Managers\Car;

use App\DTOs\Car\CarDTOInterface;
use App\Models\Car\Car;

final class CarManager implements CarManagerInterface
{
    public function create(CarDTOInterface $carDTO): Car
    {
        /** @var Car $car */
        $car = Car::query()->create($carDTO->toArray());

        return $car;
    }

    public function update(Car $car, CarDTOInterface $carDTO): Car
    {
        $car->update($carDTO->toArray());

        /** @var Car $car */
        $car = $car->refresh();

        return $car;
    }

    public function delete(Car $car): Car
    {
        $car->delete();

        return $car;
    }
}