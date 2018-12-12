<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('room_id')->comment('会议室ID');
            $table->string('name', 64)->comment('会议室名');
            $table->unsignedInteger('corp_id')->comment('所属主体ID');
            $table->boolean('status')->comment('状态，1禁用')->default(0);

            $table->foreign('corp_id')->references('corp_id')->on('corps');
        });
        \DB::statement("ALTER TABLE `rooms` comment '会议室表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
