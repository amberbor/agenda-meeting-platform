<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class AuthBack
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
        if (
            auth()->check() &&
            request()->user() !== null &&
            request()->user()->role !== null &&
            request()->user()->role->type === 'back'
        ){
            return $next($request);
        }

        return abort(403);
    }
}
