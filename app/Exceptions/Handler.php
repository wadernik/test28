<?php

namespace App\Exceptions;

use App\Http\Responses\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (RuntimeException $exception) {
            return ApiResponse::error(code: Response::HTTP_UNPROCESSABLE_ENTITY, message: $exception->getMessage());
        });

        $this->renderable(function (WrongCredentialsException $exception) {
            return ApiResponse::error(code: Response::HTTP_UNAUTHORIZED, message: $exception->getMessage());
        });
    }
}