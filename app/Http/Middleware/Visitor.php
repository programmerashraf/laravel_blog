<?php

namespace App\Http\Middleware;

use Closure;

class Visitor
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
        if (auth()->guard('visitor')->check()) {
            return $next($request);
        }
        return redirect('/login');
    }
}
