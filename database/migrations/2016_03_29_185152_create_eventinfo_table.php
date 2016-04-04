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
            $table->integer('info_id')->unsigned();
            $table->string('organizer');
            $table->string('venue');
            $table->date('reg_deadline');
            $table->date('event_date');
            $table->text('description');
            $table->foreign('info_id')->references('event_id')->on('events');
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
