<?php

namespace App\Http\Middleware;

use Closure;

//Models
use Auth;
use App\AccessLevelHasPermissions;



class RoutePermission
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
        //fetch user info by role
        $xxx = Auth::user()->role->with('accessLevel')->find( Auth::user()->roles_id  );

        //fetch user access_level_id
        $x = array_fetch($xxx->accessLevel->toArray(), 'id');

        //get route_name in the array
        $routes = array_fetch(AccessLevelHasPermissions::permissions($x)->get()->toArray(), 'route_name');

//dd($routes);
        if( !in_array($request->route()->getName(), $routes) ){
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}
