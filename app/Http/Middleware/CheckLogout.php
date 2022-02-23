<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CheckLogout
{
   
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('/dashboard/login');
        }
        return $next($request);
    }
}
