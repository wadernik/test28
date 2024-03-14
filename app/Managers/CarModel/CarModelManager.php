<?php

declare(strict_types=1);

namespace App\Managers\CarModel;

use App\DTOs\CarModel\CarModelDTOInterface;
use App\Models\CarModel\CarModel;

final class CarModelManager implements CarModelManagerInterface
{
    public function create(CarModelDTOInterface $carModelDTO): CarModel
    {
        /** @var CarModel $carModel */
        $carModel = CarModel::query()->create($carModelDTO->toArray());

        return $carModel;
    }

    public function update(CarModel $carModel, CarModelDTOInterface $carModelDTO): CarModel
    {
        $carModel->update($carModelDTO->toArray());

        /** @var CarModel $carModel */
        $carModel = $carModel->refresh();

        return $carModel;
    }

    public function delete(CarModel $carModel): CarModel
    {
        $carModel->delete();

        return $carModel;
    }
}