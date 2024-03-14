<?php

declare(strict_types=1);

namespace App\Managers\Manufacturer;

use App\DTOs\Manufacturer\ManufacturerDTOInterface;
use App\Models\Manufacturer\Manufacturer;

interface ManufacturerUpdaterInterface
{
    public function update(Manufacturer $manufacturer, ManufacturerDTOInterface $manufacturerDTO): Manufacturer;
}