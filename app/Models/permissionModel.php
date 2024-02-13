<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissionModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "permission";
    protected $fillable = ['name'];

    /**
     * The permissions that belong to the route.
     */
    public function permissions()
    {
        return $this->hasMany(permission_RoleModel::class);
    }
}
