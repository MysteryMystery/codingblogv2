<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $table = "forum_post";

    public function thread() {
        $this->belongsTo(ForumThread::class, "thread_id");
    }
}