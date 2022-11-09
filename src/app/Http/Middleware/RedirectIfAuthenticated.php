<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role == "R3") {
            return redirect()->route('admin.index');
        }
        elseif(Auth::guard($guard)->check() && Auth::user()->role == "R2"){
            return redirect()->route('referent.index');
        }
        elseif(Auth::guard($guard)->check() && Auth::user()->role == "R1"){
            return redirect()->route('ucastnik.index');
        }
        else {
            return $next($request);
        }
    }
}
