<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    protected $table = "prog_languages";

    public function frameworks(){
        return $this->hasMany(ProgrammingFramework::class, "prog_lang_id");
    }
}
