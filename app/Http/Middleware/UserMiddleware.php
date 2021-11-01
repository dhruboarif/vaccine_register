<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use auth; 
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function redirectTo()
    {
        if(Auth::user()->role_id == '2') //1 = Admin Login
        {
            return 'dashboard';
        }
        elseif(Auth::user()->role_id == '0') // Normal or Default User Login
        {
            return '/';
        }
    }
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == 2) {
            return redirect()->route('operator.dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}
