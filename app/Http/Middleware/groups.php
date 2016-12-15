<?php

namespace App\Http\Middleware;

use Closure;

class groups
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
        
//        \Debugbar::log($request);
        
        if($request->user() === null)
        {
            return response("Persmessi insufficienti per visitare questa pagina" , 401);
        }
//
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

//        if($request->user()->hasManyRole($roles) || !$roles)
//        {
            return $next($request);
//        }
//        return response("Persmessi insufficienti per visitare questa pagina" , 401);
    }
}
