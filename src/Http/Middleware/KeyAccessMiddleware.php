<?php

namespace NamHuuNam\KeyAccessPackage\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KeyAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $excludedPaths = config('key-access.excluded_paths', []);

        foreach ($excludedPaths as $path) {
            if ($request->is($path)) {
                return $next($request);
            }
        }

        if (session('key_validated')) {
            return $next($request);
        }

        return response(view('key-access-package::key-prompt'));
    }
}
