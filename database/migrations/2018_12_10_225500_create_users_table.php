<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('uid')->comment('用户ID');
            $table->string('name', 32)->comment('用户名');
            $table->string('email', 64)->comment('邮箱');
            $table->string('phone', 16)->comment('手机号');
            $table->string('password', 64)->comment('密码');
            $table->boolean('email_verified')->comment('邮箱验证，1表示验证')->default(0);
            $table->boolean('status')->comment('状态，0有效，1 锁定，2 作废')->default(0);
            $table->rememberToken();
            $table->timestamps();
    
            $table->unique('email');
            $table->unique('phone');           
        });
        \DB::statement("ALTER TABLE `users` COMMENT '用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
