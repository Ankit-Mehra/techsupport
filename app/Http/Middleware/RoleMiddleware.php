<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Usage: 'role:admin', 'role:customer'
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // dd($roles);
        if(!Auth::check()){
            return redirect()->route('login');
        }

        foreach($roles as $role){
            // dd($role);
            if(Auth::user()->hasRole($role)){
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
