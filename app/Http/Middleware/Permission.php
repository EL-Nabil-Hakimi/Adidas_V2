<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\permission_RoleModel;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle(Request $request, Closure $next): Response
        {
            $publicRoutes = ['/', 'login',  'register' , 'signup' , 'singnin'  ,'Notfound' , 'home'];
            $uri = $request->route()->uri;
            if (in_array($uri, $publicRoutes)) return $next($request);
            
            $role_id = session('role_id') ?? '';

            if ($role_id) {
                $allowedRoutes = permission_RoleModel::where('role_id', $role_id)->get();
                foreach ($allowedRoutes as $allowedRoute) {

                        $allowedUri = $allowedRoute->route->name;   

                    if (count(explode('/', $uri)) > 2) {
                        if (strstr($uri, $allowedUri))  return $next($request);
                    } else {
                        if ($uri === $allowedUri) return $next($request);
                    }
                }

                return redirect()->to('Notfound');

            } else {
                return redirect()->to('Notfound');
            }
        }
}
