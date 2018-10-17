<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    protected $table = "permissions";

    public function roles(){
        return $this->belongsToMany(Role::class, "permission_roles");
    }
}
