<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and has admin role
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        
        // Redirect to home page with error message
        return redirect()->route('home')->with('error', 'You do not have permission to access the admin area.');
    }
}
