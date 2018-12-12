<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_id')->comment('分类ID');
            $table->string('name', 32)->comment('分类名');
            $table->text('description')->comment('分类描述');
            $table->unsignedInteger('line_id')->comment('业务线ID');
            $table->unsignedInteger('parent_id')->comment('父级ID');
            $table->boolean('is_directory')->comment('是否有子分类');
            $table->tinyInteger('level')->comment('层级');
            $table->string('path')->comment('所有父级id');
            $table->boolean('status')->comment('状态，0有效，1无效');
            $table->timestamps();

            $table->foreign('line_id')->references('line_id')->on('lines');
            $table->index('parent_id');
        });
        \DB::statement("ALTER TABLE `categories` comment '需求分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
