<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Illuminate\Support\Facades\Auth::guard('admin')->check() && \Illuminate\Support\Facades\Auth::guard('admin')->user()->isAdmin() && \Illuminate\Support\Facades\Auth::guard('admin')->user()->isActive()) {
            return $next($request);
        }

        return redirect()->route('admin.login')->with('error', 'Unauthorized access. Admins only.');
    }
}
