<?php

declare(strict_types=1);

namespace App\Service\Auth;

use App\DTOs\Auth\AuthDTOInterface;
use App\Exceptions\WrongCredentialsException;

interface AuthServiceInterface
{
    /**
     * @param AuthDTOInterface $authDTO
     * @param string           $deviceName
     *
     * @return string
     * @throws WrongCredentialsException
     */
    public function retrieveToken(AuthDTOInterface $authDTO, string $deviceName = 'auth_token'): string;

    public function revokeTokenByDeviceName(string $deviceName): void;
}