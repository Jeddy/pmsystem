<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->increments('space_id')->comment('空间ID');
            $table->string('name', 32)->comment('空间名称');
            $table->text('description')->comment('业务线描述');
            $table->string('thumb')->comment('封面图');
            $table->unsignedInteger('corp_id')->comment('主体id');
            $table->boolean('status')->comment('状态，0有效，1 锁定，2 作废');
            $table->timestamps();

            $table->foreign('corp_id')->references('corp_id')->on('corps');
        });
        \DB::statement("ALTER TABLE `spaces` comment '空间表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spaces');
    }
}
