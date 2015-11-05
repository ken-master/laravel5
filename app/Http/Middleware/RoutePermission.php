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

        if( Auth::user()->find(Auth::user()->id)->is_superadmin == 1 ){
            return $next($request);
        }else{

            //fetch user info by role
            $accessLevel = Auth::user()->role->with('accessLevel')->find( Auth::user()->roles_id  );

            //fetch user access_level_id
            $x = array_fetch($accessLevel->accessLevel->toArray(), 'id');

            //get route_name in the array
            $routes = array_fetch(AccessLevelHasPermissions::permissions($x)->get()->toArray(), 'route_name');


            if( !in_array($request->route()->getName(), $routes) ){
                return abort(401);
            }

            return $next($request);
        }

       
    }
}
