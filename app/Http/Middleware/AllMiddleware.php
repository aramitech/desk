<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class AllMiddleware
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
        if ( Auth::guard('superadmin')->check() )
        {
            return $next($request);
        }
        
        
        elseif ( Auth::guard('admin')->check() )
        {
            return $next($request);
        }
        
        elseif ( Auth::guard('web')->check() )
        {
            return $next($request);
        }

      return redirect(route('login'));       
    
    }
}
