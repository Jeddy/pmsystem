<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corps', function (Blueprint $table) {
            $table->increments('corp_id')->comment('主体ID');
            $table->string('name', 32)->comment('主体名');
            $table->unsignedInteger('uid')->comment('主体联系人');
            $table->boolean('status')->comment('状态，0有效，1 无效')->default(0);
            $table->timestamps();

            $table->foreign('uid')->references('uid')->on('users');
        });
        \DB::statement("ALTER TABLE `corps` COMMENT '主体'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corps');
    }
}
