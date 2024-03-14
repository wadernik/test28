<?php

declare(strict_types=1);

namespace App\Managers\CarModel;

use App\Models\CarModel\CarModel;

interface CarModelDeleterInterface
{
    public function delete(CarModel $carModel): CarModel;
}