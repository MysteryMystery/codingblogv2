<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertMany([
            "admin.everything",
            "admin.article.create",
            "admin.article.edit",
            "admin.article.delete",

            "admin.forum.thread.delete",
            "admin.forum.thread.any.edit",

            "admin.forum.post.hide",
            "admin.forum.post.edit",
            "admin.forum.post.delete",

        ]);
    }

    private function insert(string $node) {
        DB::table("permissions")->insert([
            "node" => $node,
        ]);
    }

    private function insertMany(array $nodes){
        foreach ($nodes as $node){
            DB::table("permissions")->insert([
                "node" => $node,
            ]);
        }
    }
}
