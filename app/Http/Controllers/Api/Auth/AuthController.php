<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\DTOs\Auth\AuthDTO;
use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\ApiResponse;
use App\Service\Auth\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

final class AuthController extends AbstractApiController
{
    public function __invoke(LoginRequest $request, AuthServiceInterface $authService): JsonResponse
    {
        $dto = new AuthDTO($request->validated());

        $device = $request->header('user-agent');

        $token = $authService->retrieveToken($dto, $device);

        return ApiResponse::success(data: [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}