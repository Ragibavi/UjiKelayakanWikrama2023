<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsUser
{
    public function handle(Request $request, Closure $next)
    {
        
        if(Auth::user()->role == 'user') {
            return $next($request);
        } else {
            return redirect('/fallback');
        }
    }
}

