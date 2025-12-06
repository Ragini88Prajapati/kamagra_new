<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            $redirected_to_url  = $request->fullUrl();
            $uri_segment = $request->segments();
            if (in_array('admin', $uri_segment)) {
                return route('admin.login', ['redirect_to' => $redirected_to_url]);
            } else {
                return route('login', ['redirect_to' => $redirected_to_url]);
            }
        }
    }
}
