<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\User;

class RolesController extends Controller
{
    public function remove(Request $req){
        $email = $req->user;
        $tag = $req->tag;

        User
            ::join("user_roles", "users.id", "user_roles.user_id")
            ->join("roles", "user_roles.role_id", "roles.id")
            ->where("users.email", $email);


        return Response(204);
    }

    public function add(Request $req){

    }
}
