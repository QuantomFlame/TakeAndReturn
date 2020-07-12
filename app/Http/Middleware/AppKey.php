<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppKey
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = 'TakeAndReturn';

        $token = $request->header('Application');

        if ($token != $key)
        {
            return response()->json(['message' => 'Application key not found'], 401);
        }

        return $next($request);
    }
}
