<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateRoute
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            return $next($request);
        }

        // Redirect to the login page or perform any other action
        return redirect('/login');
    }
}
