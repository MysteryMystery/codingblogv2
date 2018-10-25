<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            "name" => "Site Owner",
            "description" => "Has every permission.",
        ]);

        $role = new Role();
        $role->name = "Moderator";
        $role->description = "Moderates the forums.";
        $role->save();

        $role = new Role;
        $role->name = "Teacher";
        $role->description = "Is able to create articles.";
        $role->save();
    }
}
