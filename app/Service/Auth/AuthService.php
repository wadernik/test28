<?php

declare(strict_types=1);

namespace App\Service\Auth;

use App\DTOs\Auth\AuthDTOInterface;
use App\Exceptions\WrongCredentialsException;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;
use function __;
use function auth;

final class AuthService implements AuthServiceInterface
{
    public function retrieveToken(AuthDTOInterface $authDTO, string $deviceName = 'auth_token'): string
    {
        if (!Auth::attempt(['username' => $authDTO->username(), 'password' => $authDTO->password()])) {
            throw new WrongCredentialsException(__('auth.failed'));
        }

        /** @var ?User $user */
        $user = User::query()
            ->where('username', $authDTO->username())
            ->limit(1)
            ->first();

        if (!$user) {
            throw new WrongCredentialsException(__('auth.failed'));
        }

        $this->revokeTokenByDeviceName($deviceName);

        $permissions = $user->permissions()?->toArray() ?? ['*'];

        return $user
            ->createToken($deviceName, $permissions)
            ->plainTextToken;
    }

    public function revokeTokenByDeviceName(string $deviceName): void
    {
        auth('sanctum')->user()?->tokens()->where('name', 'LIKE', $deviceName)->delete();
    }
}