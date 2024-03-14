<?php

declare(strict_types=1);

namespace App\Repositories\CarModel;

use App\Models\CarModel\CarModel;
use App\Repositories\CountInterface;
use App\Repositories\FindAllInterface;

/**
 * @extends FindAllInterface<CarModel>
 */
interface CarModelRepositoryInterface extends FindAllInterface, FindOneByIdInterface, CountInterface
{
}