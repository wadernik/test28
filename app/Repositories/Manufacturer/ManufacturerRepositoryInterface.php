<?php

declare(strict_types=1);

namespace App\Repositories\Manufacturer;

use App\Models\Manufacturer\Manufacturer;
use App\Repositories\CountInterface;
use App\Repositories\FindAllInterface;

/**
 * @extends FindAllInterface<Manufacturer>
 */
interface ManufacturerRepositoryInterface extends FindAllInterface, FindOneByIdInterface, CountInterface
{
}