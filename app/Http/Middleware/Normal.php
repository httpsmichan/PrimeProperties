<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Normal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $role=Auth::user()->role;

        if($role=='user'){
            return $next($request);
        }

        if($role=='admin'){
            return redirect()->route('admin');
        }

        if($role=='agent'){
            return redirect()->route('agent');
        }
    }
}
