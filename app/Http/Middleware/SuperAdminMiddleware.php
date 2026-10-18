<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Unauthorized access.');
        }

        if (!auth()->user()->is_active) {
            auth()->logout();

            return redirect()
                ->route('login')
                ->with('error', 'Your account is inactive.');
        }

        return $next($request);
    }
}
