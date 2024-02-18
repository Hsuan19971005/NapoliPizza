<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureGetRequest {
    public function handle(Request $request, Closure $next, $sessionKey) {
        if (!$request->session()->has($sessionKey)) {
            abort(403, 'Unauthorized');
        }

        $request->session()->forget($sessionKey);
        return $next($request);
    }
}
