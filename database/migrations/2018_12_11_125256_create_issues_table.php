<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('issue_id')->comment('缺陷ID');
            $table->unsignedInteger('space_id')->comment('空间ID');
            $table->string('title')->comment('缺陷描述');
            $table->text('description')->comment('缺陷详情');
            $table->string('product_ids')->comment('关联产品，一对多');
            $table->boolean('priority')->comment('优先级/严重程度，0-5');
            $table->dateTime('feedback_at')->comment('反馈时间');
            $table->string('feedback_name', 32)->comment('反馈人');
            $table->string('feedback_email', 64)->comment('反馈人邮箱');
            $table->text('solution')->comment('解决方案');
            $table->dateTime('solved_at')->comment('解决时间');
            $table->unsignedInteger('solved_uid')->comment('解决人');
            $table->boolean('is_feature')->comment('是否衍生需求');
            $table->boolean('status')->comment('状态，0待处理，1保持关注，2已解决，3已拒绝');
            $table->boolean('is_del')->comment('是否删除，1删除');
            $table->unsignedInteger('created_uid')->comment('创建人');
            $table->timestamps();

            $table->foreign('space_id')->references('space_id')->on('spaces');
            $table->foreign('solved_uid')->references('uid')->on('users');
            $table->foreign('created_uid')->references('uid')->on('users');
            $table->index('product_ids');
        });
        \DB::statement("ALTER TABLE `issues` comment '缺陷Bug表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
