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
        //  dd($request->method());

        // dd(Auth()->user()->isManager());

        if($request->method() == 'DELETE' || $request->method() == 'PATCH'){
            if(! Auth()->user()->isManager()){
               abort(403);
            }
         }
         
        if(auth()->check()){
            if(auth()->user()->isAdmin()){
                return $next($request);
            }
            return redirect('/');
        }
         
        
    }
}
