<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //check if the user is logged in
        if ($request->user() === null) {
            return response("Insufficient permissions", 401);
        }
        
        //check the route action and roles
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        if ($request->user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }
        return response("Insufficient permissions", 401);
    }
}
