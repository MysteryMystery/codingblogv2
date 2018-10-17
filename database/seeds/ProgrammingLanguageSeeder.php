<?php

use Illuminate\Database\Seeder;

class ProgrammingLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertMany([
           "Ruby" => "lorem ipsum",
            "Python" => "lorem ipsum",
            "Java" => "lorem ipsum",
            "Scala" => "lorem ipsum",
            "PHP" => "lorem ipsum",
            "JavaScript"=> "lorem ipsum",
        ]);
    }

    private function insertMany(array $things){
        foreach ($things as $k => $v){
            DB::table("prog_languages")
                ->insert([
                    "name" => $k,
                    "description" => $v,
                ]);
        }
    }
}
