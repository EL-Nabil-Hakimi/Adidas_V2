<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesModel extends Model
{
    use HasFactory;

    protected $table  = "roles";
    protected $fillable = ['name'];

    /**
     * The permissions that belong to the route.
     */
    public function permissions()
        {
            return $this->hasMany(permission_RoleModel::class);
        }

}