<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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

            return $next($request);

        }
        else
        {
            return redirect(route("nedmin.login"))->with("error", "Erişim yetkiniz yok");
        }

        return redirect(route("nedmin.login"));


    }
}
