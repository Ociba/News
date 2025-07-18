<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsBuyer
{
    public function handle(Request $request, Closure $next): Response
{
    // Allow admin to bypass all checks
    if (auth()->user()?->user_type === 'admin') {
        return $next($request);
    }

    // Handle non-authenticated users
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    // Handle non-buyer users
    if (auth()->user()->user_type !== 'buyer') {
        abort(403, 'Unauthorized: This action requires buyer privileges.');
    }

    return $next($request);
}
}



