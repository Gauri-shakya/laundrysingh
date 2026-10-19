<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Illuminate\Support\Facades\Auth::guard('customer')->check() && \Illuminate\Support\Facades\Auth::guard('customer')->user()->isCustomer() && \Illuminate\Support\Facades\Auth::guard('customer')->user()->isActive()) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Unauthorized access. Customers only.');
    }
}
