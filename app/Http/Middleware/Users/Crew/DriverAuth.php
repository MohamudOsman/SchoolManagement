<?php

namespace App\Http\Middleware\Users\Crew;

use Closure;

class DriverAuth
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
        if(Auth::user()->type!=6)
        {
            return back()->withInput();
        }

        return $next($request);
    }
}
