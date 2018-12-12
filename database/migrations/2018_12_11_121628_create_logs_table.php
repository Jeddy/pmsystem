<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('related_id')->comment('关联表主键');
            $table->string('related_table', 64)->comment('关联表');
            $table->string('action', 64)->comment('动作');
            $table->string('url')->comment('请求路由');
            $table->unsignedInteger('created_uid')->comment('添加人');
            $table->json('data_before')->comment('操作前数据');
            $table->json('data_after')->comment('操作后数据');
            $table->timestamps();

            $table->index('related_id');
            $table->foreign('created_uid')->references('uid')->on('users');
        });
        \DB::statement("ALTER TABLE `logs` comment '操作日志表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
