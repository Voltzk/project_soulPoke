<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (!$user || ($user->type ?? null) !== 'admin') {
            return response()->json(['error' => 'Unauthorized. Admins only.'], 403);
        }
        return $next($request);
    }
}
