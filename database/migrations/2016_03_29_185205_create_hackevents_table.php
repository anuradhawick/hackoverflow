<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHackeventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hackathons',function(Blueprint $table){
            $table->increments('id');
            $table->integer('hack_id')->unsigned();
            $table->text('participant_info')->nullable();
            $table->text('reward')->nullable();
            $table->text('duration')->nullable();
            $table->integer('team_count')->nullable();
            $table->integer('max_per_team_no')->nullable();
            $table->integer('min_per_team_no')->nullable();
            $table->foreign('hack_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hackathons');
    }
}
