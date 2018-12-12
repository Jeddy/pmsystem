<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('meeting_id')->comment('会议ID');
            $table->string('title', 64)->comment('会议主体');
            $table->text('content')->comment('会议内容');
            $table->unsignedInteger('corp_id')->comment('主体ID');
            $table->unsignedInteger('room_id')->comment('会议室ID');
            $table->dateTime('started_at')->comment('开始时间');
            $table->dateTime('finished_at')->comment('结束时间');
            $table->unsignedInteger('created_uid')->comment('创建人');
            $table->timestamps();

            $table->foreign('corp_id')->references('corp_id')->on('corps');
            $table->foreign('room_id')->references('room_id')->on('rooms');
            $table->foreign('created_uid')->references('uid')->on('users');
        });
        \DB::statement("ALTER TABLE `meetings` comment '会议表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
