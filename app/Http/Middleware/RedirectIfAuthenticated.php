<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Closure                 $next    next
     * @param string|null              $guard   guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (\Auth::user()->role_id == 1) {                
                return redirect()->route('admin.users.index');
            } else {
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
