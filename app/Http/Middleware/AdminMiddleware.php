<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('user_type') || session('user_type') !== 'admin') {
            return redirect()->route('login')->with('error', 'Akses admin diperlukan');
        }

        return $next($request);
    }
}
