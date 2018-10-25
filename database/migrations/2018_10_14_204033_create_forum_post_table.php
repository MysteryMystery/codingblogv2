<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_posts', function (Blueprint $table) {

            /**
             * Order the forum posts in a thread by the timestamps :) (older posts come first)
             */

            $table->increments('id');
            $table->integer("creator_id");
            $table->string("contents");
            $table->integer("thread_id");
            $table->integer("up_votes")->unsigned();
            $table->integer("down_votes")->unsigned();
            $table->boolean("is_hidden")->default(false);
            $table->boolean("is_edit_locked")->default(false);
            $table->boolean("is_deleted")->default(false);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_post');
    }
}
