<?php

namespace App\Http\Middleware;

use Closure;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->hasRole($role)) {
            return $next($request);
        }
        if ($request->user()) return response(view('errors/401'), 401);

        return redirect()->route('login');
    }
}
