<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    private function usersAdminQuery($like = ""){
        $q = DB::table("users")
            ->join("user_roles", "users.id", "user_roles.user_id")
            ->join("roles", "user_roles.role_id", "roles.id")
            ->select("users.*", "roles.name as role_name", "roles.display_name as display_name");

        if ($like !== ""){
            $q
                ->where("users.email", "LIKE", $like)
                ->orWhere("users.id", $like)
                ->orWhere("users.name", "LIKE", $like);
        }

        return $q->orderBy("users.email")->get();
    }

    public function users(Request $request){
        //$users = User::with("roles")->get();
        //$users = $this->usersAdminQuery();
        return view("admin.manage_users", ["users" => User::all(), "roles" => Role::all()]);
    }

    public function usersSearch(Request $request){
        /*if ($request->ajax()){
            return Response($this->usersAdminQuery("%" . $request->search . "%"));
        }
        return Response();*/

        return Response($this->usersAdminQuery("%" . $request->search . "%"));
    }
}
