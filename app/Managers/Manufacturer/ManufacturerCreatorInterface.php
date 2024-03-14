<?php

declare(strict_types=1);

namespace App\Managers\Manufacturer;

use App\DTOs\Manufacturer\ManufacturerDTOInterface;
use App\Models\Manufacturer\Manufacturer;

interface ManufacturerCreatorInterface
{
    public function create(ManufacturerDTOInterface $manufacturerDTO): Manufacturer;
}