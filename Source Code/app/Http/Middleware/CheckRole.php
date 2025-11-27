<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user || !in_array(strtolower($user->role), array_map('strtolower', $roles))) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
