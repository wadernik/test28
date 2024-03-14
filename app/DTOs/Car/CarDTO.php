<?php

declare(strict_types=1);

namespace App\DTOs\Car;

final class CarDTO implements CarDTOInterface
{
    /**
     * @param array{
     *     manufacturer_id: int,
     *     model_id: int,
     *     release_year: string|null,
     *     mileage: int|null,
     *     color: string|null
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