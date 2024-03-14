<?php

declare(strict_types=1);

namespace App\Repositories\Car;

use App\Models\Car\Car;
use App\Repositories\CountInterface;
use App\Repositories\FindAllInterface;

/**
 * @extends FindAllInterface<Car>
 */
interface CarRepositoryInterface extends FindAllInterface, FindAllByIdsInterface, FindOneByIdInterface, CountInterface
{
}