<?php

namespace App\Http\Middleware\Users;

use Closure;

class TeacherAuth
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
        if(Auth::user()->type!=2)
        {
            return redirect()-> back()->withInput();
        }
        return $next($request);
    }
}
