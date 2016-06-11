<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('info_id')->unsigned();
            $table->string('organizer')->nullable();
            $table->string('venue')->nullable();
            $table->date('reg_deadline');
            $table->date('event_date');
            $table->text('description')->nullable();
            $table->foreign('info_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_info');
    }
}
