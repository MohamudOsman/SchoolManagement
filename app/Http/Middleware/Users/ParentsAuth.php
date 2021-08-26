<?php

namespace App\Http\Middleware\Users;

use Closure;

class ParentsAuth
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
        if(Auth::user()->type!=3)
        {
            return redirect()-> back()->withInput();
        }

        return $next($request);
    }
}
