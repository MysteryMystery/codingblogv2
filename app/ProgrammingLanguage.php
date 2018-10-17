<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProgrammingLanguage extends Model
{
    protected $table = "prog_languages";

    public function frameworks(){
        return $this->hasMany(ProgrammingFramework::class, "prog_lang_id");
    }

    public static function allLangs(){
        return ProgrammingLanguage::orderBy("name")->get();
    }
}
