<?php

declare(strict_types=1);

namespace App\DTOs\UserCarFavorite;

final class UserCarFavoriteDTO implements UserCarFavoriteDTOInterface
{
    /**
     * @param array{
     *     cars: array<array{
     *         id: int
     *     }>,
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