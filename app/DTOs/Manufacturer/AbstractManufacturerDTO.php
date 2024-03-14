<?php

declare(strict_types=1);

namespace App\DTOs\Manufacturer;

abstract class AbstractManufacturerDTO implements ManufacturerDTOInterface
{
    /**
     * @param array{
     *     name: string,
     * } $attributes
     */
    public function __construct(private readonly array $attributes)
    {
    }

    public function name(): string
    {
        return $this->attributes['name'];
    }

    public function toArray(): array
    {
        return $this->attributes;
    }
}