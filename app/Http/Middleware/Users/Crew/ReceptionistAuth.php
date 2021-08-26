<?php

namespace App\Http\Middleware\Users\Crew;

use Closure;

class ReceptionistAuth
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
        if(Auth::user()->type!=9)
        {
            return redirect()-> back()->withInput();
        }

        return $next($request);
    }
}
