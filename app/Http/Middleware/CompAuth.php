<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CompAuth
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
        
        if (Auth::guard('comp')->check()) {
            // return redirect('/donerd');
        }else{
            return redirect('/');
        }
        return $next($request);
    }
}

?>