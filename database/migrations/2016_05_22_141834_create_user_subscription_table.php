<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sub', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('sub_id')->references('id')->on('subscriptions');
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
        Schema::dropIfexists('user_sub');
    }
}
