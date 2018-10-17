<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ArticleComment;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $table = "articles";

    public function comments() {
        return $this->hasMany(ArticleComment::class, "article_id");
    }
}
