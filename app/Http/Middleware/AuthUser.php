<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUser
{
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('user')->check()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
