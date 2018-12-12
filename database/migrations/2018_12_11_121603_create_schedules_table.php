<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id')->comment('日程ID');
            $table->unsignedInteger('uid')->comment('所属用户');
            $table->string('title')->comment('日程标题');
            $table->text('description')->comment('日程详细');
            $table->string('context')->comment('上下文');
            $table->dateTime('started_at')->comment('开始时间');
            $table->dateTime('finished_at')->comment('完成时间');
            $table->boolean('is_delay')->comment('1延期')->default(0);
            $table->boolean('status')->comment('状态，1完成')->default(0);
            $table->boolean('flag')->comment('星标')->default(0);
            $table->boolean('priority')->comment('1-5')->default(0);
            $table->unsignedInteger('created_uid')->comment('添加人');
            $table->timestamps();

            $table->foreign('uid')->references('uid')->on('users');
            $table->foreign('created_uid')->references('uid')->on('users');
        });
        \DB::statement("ALTER TABLE `schedules` comment '日程表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
