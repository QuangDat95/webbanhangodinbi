<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }
        return redirect('/dashboard/login');
    }
}
