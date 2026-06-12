<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('user_type') || session('user_type') !== 'user') {
            return redirect()->route('login')->with('error', 'Login sebagai user diperlukan');
        }

        return $next($request);
    }
}
