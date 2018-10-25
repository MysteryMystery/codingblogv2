<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ForumPost extends Model
{
    protected $table = "forum_posts";

    public function thread() {
        $this->belongsTo(ForumThread::class, "thread_id");
    }

    public function upVote($amount = 1) {
        ForumPost::increment("up_votes", $amount);
    }

    public function downVote($amount = 1){
        ForumPost::decrement("down_votes", $amount);
    }
}
