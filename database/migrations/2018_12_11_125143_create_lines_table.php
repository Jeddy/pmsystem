<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->increments('line_id')->comment('业务线ID');
            $table->string('name', 64)->comment('业务线名称');
            $table->text('description')->comment('业务线描述');
            $table->unsignedInteger('space_id')->comment('空间id');
            $table->boolean('status')->comment('状态，0有效，1无效');
            $table->timestamps();

            $table->foreign('space_id')->references('space_id')->on('spaces');
        });
        \DB::statement("ALTER TABLE `lines` comment '业务线表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lines');
    }
}
