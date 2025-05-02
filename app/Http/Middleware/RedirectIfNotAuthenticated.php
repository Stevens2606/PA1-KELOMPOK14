<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('loginform'); // Redirect ke halaman login dengan route name
        }

        return $next($request);
    }
}   