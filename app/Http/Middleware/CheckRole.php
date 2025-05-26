<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // ✅ Define which roles are allowed to access /admin routes
        $allowedRoles = ['admin'];

        if (!$user || !$user->hasAnyRole($allowedRoles)) {
            return redirect()->route('no.role');
        }

        return $next($request);
    }
}
