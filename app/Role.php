<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

class Role extends Model
{
    protected $table = "roles";

    public static function getPermissions(string $role): array {
        return DB::table("roles")
            ->join("permission_roles", "roles.id", "permission_roles.role_id")
            ->join("permissions", "permission_roles.permission_id", "permissions.id")
            ->where("roles.name", $role)
            ->select("permissions.id", "permissions.node")
            ->get();
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, "permission_roles");
    }

    public function users() {
        return $this->belongsToMany(User::class, "user_roles");
    }
}
