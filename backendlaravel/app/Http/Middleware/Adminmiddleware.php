<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class Adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 'admin'){
                return $next($request);
            }
            else {
                return response([
                    'message' => 'not admin'
                ], 401);
            }
        }
        
       
        
    }
}
