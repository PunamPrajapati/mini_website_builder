<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        // You can add custom exception reporting here if needed
    }

    /**
     * Handle unauthenticated exceptions for APIs or web routes.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // Return JSON for API routes or requests that expect JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'message' => 'Unauthenticated. Please log in.',
            ], 401);
        }

        // Default fallback: redirect to login page
        return redirect()->guest(route('login'));
    }
}
