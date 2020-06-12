<?php

namespace App\Http\Middleware;

use App\Helpers\Classes\Flash;
use Illuminate\Http\Request;
use Closure;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_at !== null) {

            auth()->logout();

            Flash::error(__('Your account has been suspended. Please contact administrator.'));

            return redirect()->route('login');
        }

        return $next($request);
    }
}
