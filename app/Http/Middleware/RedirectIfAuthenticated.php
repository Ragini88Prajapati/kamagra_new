<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                return redirect(RouteServiceProvider::ADMIN_HOME);
            case 'user':
                return redirect(RouteServiceProvider::HOME);
            default:
                return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
