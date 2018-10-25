<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        //return $this->belongsToMany(Role::class, "user_roles", "role_id");

        return DB::table("users")
            ->join("user_roles", "users.id", "user_roles.user_id")
            ->join("roles", "user_roles.role_id", "roles.id")
            ->where("users.id", $this->id)
            ->get();
    }

    public function hasPermission(string $node): bool{
        return DB::table("users")
            ->join("user_roles", "user_roles.user_id", "=", "users.id")
            ->join("roles", "user_roles.role_id", "=", "roles.id")
            ->join("permission_roles", "permission_roles.role_id", "=", "roles.id")
            ->join("permissions", "permissions.id", "=", "permission_roles.permission_id")
            ->where("permissions.node", "=", $node)
            ->exists();
    }

    public function canHaveAdminTab(): bool {
        return DB::table("users")
            ->join("user_roles", "user_roles.user_id", "=", "users.id")
            ->join("roles", "user_roles.role_id", "=", "roles.id")
            ->join("permission_roles", "permission_roles.role_id", "=", "roles.id")
            ->join("permissions", "permissions.id", "=", "permission_roles.permission_id")
            ->where("users.id", $this->id)
            ->where("permissions.node", "LIKE", "admin.%")
            ->exists();
    }

    public function giveRole(){

    }
}
