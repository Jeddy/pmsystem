<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interations', function (Blueprint $table) {
            $table->increments('interation_id')->comment('迭代ID');
            $table->unsignedInteger('project_id')->comment('项目ID');
            $table->unsignedInteger('product_id')->comment('产品ID');
            $table->string('product_version', 16)->comment('产品版本号');
            $table->unsignedInteger('product_ower_uid')->comment('产品负责人');
            $table->boolean('status')->comment('状态，0有效，1无效');
            $table->timestamps();
        
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('product_ower_uid')->references('uid')->on('users');
        });
        \DB::statement("ALTER TABLE `interations` comment '项目产品表（迭代表）'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interations');
    }
}
