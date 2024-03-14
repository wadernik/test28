<?php

declare(strict_types=1);

namespace App\Checker;

use App\Repositories\Car\FindAllByIdsInterface;
use function collect;

final class AllCarsExistChecker implements AllCarsExistCheckerInterface
{
    public function __construct(private readonly FindAllByIdsInterface $carRepository)
    {
    }

    public function check(array $carIds): bool
    {
        $cars = $this->carRepository->findAllByIds($carIds);

        if ($cars->isEmpty()) {
            return false;
        }

        $carsCollectionById = collect($cars)->keyBy('id')->toArray();

        foreach ($carIds as $carId) {
            if (!isset($carsCollectionById[$carId])) {
                return false;
            }
        }

        return true;
    }
}