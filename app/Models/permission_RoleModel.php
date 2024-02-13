<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission_RoleModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "permission_role";
    protected $fillable = [
        'route_id',
        'role_id',
        'name', 
    ];


    /**
     * The role that the permission belongs to.
     */
    public function role()
    {
        return $this->belongsTo(rolesModel::class);
    }

    /**
     * The route that the permission belongs to.
     */
    public function route()
    {
        return $this->belongsTo(permissionModel::class);
    }
}    
