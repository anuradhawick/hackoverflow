<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_feedback',function(Blueprint $table){
            $table->increments('id');
            $table->integer('forum_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('action')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
            $table->foreign('forum_id')->references('id')->on('forum_posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_feedback');
    }
}
