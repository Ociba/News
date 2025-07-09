<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsBuyer
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->user_type !== 'buyer') {
            abort(403, 'Unauthorized: Buyers only.');
        }

        return $next($request);
    }
}



