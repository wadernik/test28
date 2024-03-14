<?php

declare(strict_types=1);

namespace App\DTOs\Auth;

final class AuthDTO implements AuthDTOInterface
{
    /**
     * @param array{
     *     username: string,
     *     password: string
     * } $attributes
     */
    public function __construct(private readonly array $attributes)
    {
    }

    public function username(): string
    {
        return $this->attributes['username'];
    }

    public function password(): string
    {
        return $this->attributes['password'];
    }
}