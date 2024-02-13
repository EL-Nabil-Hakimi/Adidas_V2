<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\permissionModel as RouteModel;
use App\Models\rolesModel as RoleModel;
use App\Models\permission_RoleModel as PermissionModel;
use Illuminate\Support\Facades\Route;


class AddPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        # Truncate tables :
        $routes = RouteModel::all();
        foreach ($routes as $route) $route->delete();
        $permissions = PermissionModel::all();
        foreach ($permissions as $permission) $permission->delete();

        # Get all the Routes :
        $routes = Route::getRoutes();
        $routesSaved = [];

        # Add the Routes to Routes table :
        foreach ($routes as $route) {
            $uri = $route->uri();

            # remove laravel default routes :
            if (strstr($uri, '_')) continue;
            if (strstr($uri, 'api')) continue;
            if (strstr($uri, 'csrf')) continue;

            # check route length :
            if (count(explode('/', $uri)) >= 3) continue;

            # check for Duplicate :
            if (in_array($uri, $routesSaved)) continue;

            RouteModel::create([
                'name' => $uri,
            ]);

            $routesSaved[] = $uri;
        }

        # Fill Permissions Table :
        $modelRoutes = RouteModel::all();
        $adminRole = RoleModel::where('name', 'Admin')->first();
        $guestRole = RoleModel::where('name', 'Guest')->first();
 
        # Admin Routes :
        foreach ($modelRoutes as $route) {
            PermissionModel::create([
                "route_id" => $route->id,
                "role_id" => $adminRole->id
            ]);
        }

        # Guest Routes :
        
        

    }
}

