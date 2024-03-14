<?php

namespace App\Http\Middleware;

use App\Http\Responses\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use function __;

class SanctumPermissions
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        foreach ($permissions as $permission) {
            if (!$request->user()->tokenCan($permission)) {
                return ApiResponse::error(code: 403, message: __('permissions.access.denied'));
            }
        }

        return $next($request);
    }
}