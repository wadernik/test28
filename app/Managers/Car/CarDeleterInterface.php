<?php

declare(strict_types=1);

namespace App\Managers\Car;

use App\Models\Car\Car;

interface CarDeleterInterface
{
    public function delete(Car $car): Car;
}