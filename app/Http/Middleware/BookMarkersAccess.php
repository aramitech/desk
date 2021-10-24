<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class BookMarkersAccess
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
        if ( Auth::check() )
        {
            if ( Auth::user()->records_bookmarkers_r == 'Allowed' )
            {
                return $next($request);
            }
        }
        else if ( Auth::guard('superadmin')->check() || Auth::guard('admin')->check() )
        {
            return $next($request);
        }
        
      return redirect(route('login'));       
    
    }
}