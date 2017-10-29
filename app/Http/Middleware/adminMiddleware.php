<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use App\Http\Controllers\Auth;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        If(\Auth::user()->admin) {
            return $next($request);
        }
        else
        {
            return redirect()->route('publicHomePage');

        }
    }
}
