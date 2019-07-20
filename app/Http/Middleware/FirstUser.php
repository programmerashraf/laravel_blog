<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class FirstUser
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
        if (User::all()->count() == 0){
            return $next($request);
        }
        return redirect()->route("login");
    }
}
