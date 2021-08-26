<?php

namespace App\Http\Middleware\Users\Crew;

use Closure;

class AccountantAuth
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
        if(Auth::user()->type!=5)
        {
            return redirect()-> back()->withInput();
        }

        return $next($request);
    }
}
