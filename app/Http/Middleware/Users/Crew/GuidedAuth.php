<?php

namespace App\Http\Middleware\Users\Crew;

use Closure;

class GuidedAuth
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
        if(Auth::user()->type!=7)
        {
            return back()->withInput();
        }

        return $next($request);
    }
}
