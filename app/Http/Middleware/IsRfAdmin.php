<?php

namespace App\Http\Middleware;

use Closure;

class IsRfAdmin
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
        if (\Auth::user() &&  \Auth::user()->level=='admin_rf') {
            return $next($request);
     }
    return redirect('/login3');
    }
}
