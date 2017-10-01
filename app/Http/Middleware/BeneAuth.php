<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class BeneAuth
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
        
        if (Auth::guard('bene')->check()) {
            // return redirect('/bened');
        }else{
            return redirect('/bene-login');
        }
        return $next($request);
    }
}

?>