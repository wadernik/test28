<?php

declare(strict_types=1);

namespace App\DTOs\Auth;

interface AuthDTOInterface
{
    public function username(): string;

    public function password(): string;
}