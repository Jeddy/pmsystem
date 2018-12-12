<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('feature_id')->comment('需求ID');
            $table->unsignedInteger('space_id')->comment('空间ID');
            $table->string('title')->comment('需求标题');
            $table->text('description')->comment('需求描述');
            $table->text('business_value')->comment('业务价值');
            $table->boolean('priority')->comment('优先级，0表示最高优');
            $table->string('label', 16)->comment('需求标签：新增、优化');
            $table->string('label_custom')->comment('自定义标签，多个用逗号隔开');
            $table->unsignedInteger('category_id')->comment('需求分类ID');
            $table->unsignedInteger('from_depart_id')->comment('需求来源部门');
            $table->string('from_employee', 32)->comment('需求人姓名');
            $table->string('from_employee_email', 64)->comment('需求人邮箱');
            $table->unsignedInteger('followed_uid')->comment('跟进人');
            $table->unsignedInteger('issue_id')->comment('关联缺陷id');
            $table->unsignedInteger('parent_id')->comment('父需求ID');
            $table->boolean('status')->comment('需求状态，0规划中，1迭代中，2已完成，3拒绝，4废止');
            $table->boolean('is_del')->comment('是否删除，1删除');
            $table->unsignedInteger('created_uid')->comment('创建人');
            $table->timestamps();

            $table->foreign('space_id')->references('space_id')->on('spaces');
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('from_depart_id')->references('depart_id')->on('departments');
            $table->foreign('followed_uid')->references('uid')->on('users');
            $table->foreign('created_uid')->references('uid')->on('users');
            $table->foreign('issue_id')->references('issue_id')->on('issues');
            $table->index('parent_id');
        });
        \DB::statement("ALTER TABLE `features` comment '需求表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
