<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class DonerAuth
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
        
        if (Auth::guard('doner')->check()) {
            // return redirect('/donerd');
        }else{
            return redirect('/doner-login');
        }
        return $next($request);
    }
}

?>