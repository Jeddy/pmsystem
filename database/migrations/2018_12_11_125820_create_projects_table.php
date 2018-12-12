<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id')->comment('项目ID');
            $table->unsignedInteger('space_id')->comment('空间ID');
            $table->string('name', 64)->comment('项目名');
            $table->text('description')->comment('项目描述');
            $table->text('business_value')->comment('项目价值');
            $table->dateTime('pm_meeting_at')->comment('产品评审时间');
            $table->dateTime('rd_meeting_at')->comment('技术评审时间');
            $table->dateTime('qa_meeting_at')->comment('测试评审时间');
            $table->dateTime('ui_meeting_at')->comment('设计评审时间');
            $table->dateTime('test_start_at')->comment('测试开始时间');
            $table->dateTime('plan_online_at')->comment('计划上线时间');
            $table->dateTime('actual_online_at')->comment('实际上线时间');
            $table->boolean('is_delay')->comment('是否延期上线，1延期');
            $table->string('delay_note')->comment('延期原因');
            $table->unsignedInteger('created_uid')->comment('创建人');
            $table->unsignedInteger('owner_uid')->comment('项目负责人');
            $table->boolean('status')->comment('项目状态，0规划中，1评审中，2等待开发，3开发中，4等待测试，5测试中，6验收中，7准备上线，8灰度发布，9已上线, 10取消，11暂停');
            $table->string('canceled_note')->comment('取消原因');
            $table->string('stoped_note')->comment('暂停原因');
            $table->boolean('is_del')->comment('删除标记');
            $table->timestamps();

            $table->foreign('space_id')->references('space_id')->on('spaces');
            $table->foreign('created_uid')->references('uid')->on('users');
            $table->foreign('owner_uid')->references('uid')->on('users');
            $table->index('status');
        });
        \DB::statement("ALTER TABLE `projects` comment '项目表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
