<?php

declare(strict_types=1);

namespace App\DTOs\CarModel;

abstract class AbstractCarModelDTO implements CarModelDTOInterface
{
    /**
     * @param array{
     *     name: string,
     *     manufacturer_id: int
     * } $attributes
     */
    public function __construct(private readonly array $attributes)
    {
    }

    public function toArray(): array
    {
        return $this->attributes;
    }
}