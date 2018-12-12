<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterationDurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interation_durations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('interation_id')->comment('迭代ID');
            $table->unsignedInteger('uid')->comment('人员ID');
            $table->dateTime('started_at')->comment('预计开始时间');
            $table->dateTime('finished_at')->comment('预计结束时间');
            $table->text('content')->comment('人员工作内容');
            $table->boolean('status')->comment('状态，0有效，1无效');
            $table->timestamps();

            $table->foreign('interation_id')->references('interation_id')->on('interations');
            $table->foreign('uid')->references('uid')->on('users');
        });
        \DB::statement("ALTER TABLE `interation_durations` comment '迭代周期表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interation_durations');
    }
}
