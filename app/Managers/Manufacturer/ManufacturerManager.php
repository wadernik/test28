<?php

declare(strict_types=1);

namespace App\Managers\Manufacturer;

use App\DTOs\Manufacturer\ManufacturerDTOInterface;
use App\Models\Manufacturer\Manufacturer;

final class ManufacturerManager implements ManufacturerManagerInterface
{
    public function create(ManufacturerDTOInterface $manufacturerDTO): Manufacturer
    {
        /** @var Manufacturer $manufacturer */
        $manufacturer = Manufacturer::query()->create($manufacturerDTO->toArray());

        return $manufacturer;
    }

    public function update(Manufacturer $manufacturer, ManufacturerDTOInterface $manufacturerDTO): Manufacturer
    {
        $manufacturer->update($manufacturerDTO->toArray());

        /** @var Manufacturer $manufacturer */
        $manufacturer = $manufacturer->refresh();

        return $manufacturer;
    }

    public function delete(Manufacturer $manufacturer): Manufacturer
    {
        $manufacturer->delete();

        return $manufacturer;
    }
}