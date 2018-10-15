<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ForumPost;

class ForumThread extends Model
{
    protected $table = "forum_thread";

    public function posts() {
        $this->hasMany(ForumPost::class, "thread_id");
    }
}
