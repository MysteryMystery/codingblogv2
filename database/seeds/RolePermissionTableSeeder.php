<?php

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("permission_roles")->insert([
            "permission_id" => 1,
            "role_id" => 1,
        ]);
    }
}
