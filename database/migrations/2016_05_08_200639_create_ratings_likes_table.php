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
        Schema::create('ratings',function(Blueprint $table){
            $table->increments('id');
            $table->integer('forum_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('action')->nullable();
            $table->string('rating')->nullable();
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
        Schema::dropIfExists('ratings');
    }
}
