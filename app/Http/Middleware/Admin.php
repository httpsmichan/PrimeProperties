<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
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

        if($role=='admin'){
            return $next($request);
        }

        if($role=='agent'){
            return redirect()->route('agent');
        }

        if($role=='user'){
            return redirect()->route('dashboard');
        }
    }
}
