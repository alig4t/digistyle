<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminUser
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
        //  dd($request);
        if(auth()->check()){
            if(auth()->user()->isAdmin()){
                return $next($request);
            }
            return redirect('/');
        }
         
    }
}
