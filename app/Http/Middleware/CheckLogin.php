<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle ($request, Closure $next)
    {
        if (isset(Auth::user()->role) and Auth::user()->role == 'admin')
        {
            return redirect(route("nedmin.index"));
        }
        else
        {
            return $next($request);
        }

        //        return redirect(route("nedmin.login"));
    }
}
