<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('api/*') && !auth('sanctum')->check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if (!$request->is('api/*') && !auth()->check()) {
            return redirect()->guest(route('login'));
        }

        return $next($request);
    }
}
