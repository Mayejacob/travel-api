<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            throw new AuthenticationException('Unauthenticated.');
        }
        return $request->expectsJson() ? null : route('login');
    }
}