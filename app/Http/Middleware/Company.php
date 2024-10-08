<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Company
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
            // dd('name mismatch', $request->route()->getName(),);
            return $next($request);
        }

        return redirect()->route('login');
    }
}
