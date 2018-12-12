<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('depart_id')->comment('部门ID');
            $table->unsignedInteger('corp_id')->comment('所属主体ID');
            $table->string('depart_name', 32)->comment('部门名');
            $table->string('depart_email', 32)->comment('部门邮箱');
            $table->unsignedInteger('parent_id')->comment('上级部门ID');
            $table->boolean('status')->comment('状态，0有效，1 无效')->default(0);
            $table->timestamps();

            $table->foreign('corp_id')->references('corp_id')->on('corps');
            $table->index('parent_id');
        });
        \DB::statement("ALTER TABLE `departments` comment '部门表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
