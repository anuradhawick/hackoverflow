<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateOthereventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('others_id')->unsigned();
            $table->text('participant_info')->nullable();
            $table->text('duration')->nullable();
            $table->integer('head_count')->nullable();
            $table->foreign('others_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_events');
    }
}
