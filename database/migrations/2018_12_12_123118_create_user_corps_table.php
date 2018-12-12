<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCorpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_corps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('uid')->comment('用户ID');
            $table->unsignedInteger('corp_id')->comment('关联企业ID');
            $table->unsignedInteger('depart_id')->comment('关联企业-部门ID');
            $table->unsignedInteger('oa_uid')->comment('关联企业-内部系统ID，如钉钉ID');
            $table->boolean('is_default')->comment('默认企业，1表示默认');
            $table->boolean('status')->comment('状态，1表示无效-解除绑定');
            $table->timestamps();

            $table->foreign('uid')->references('uid')->on('users');
            $table->foreign('corp_id')->references('corp_id')->on('corps');
            $table->foreign('depart_id')->references('depart_id')->on('departments');
            $table->index('oa_uid');
        });
        \DB::statement("ALTER TABLE `user_corps` comment '用户-企业关系表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_corps');
    }
}
