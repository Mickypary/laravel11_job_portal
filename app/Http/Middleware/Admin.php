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
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        // Auth::guard($guard)->check()
        if (auth()->guard($guard)->check()) {
            return $next($request);
        }

        return redirect()->route('admin_login');

        // if (!$request->expectsJson()) {
        //      return redirect()->route('admin_login');
        // }
    }
}
