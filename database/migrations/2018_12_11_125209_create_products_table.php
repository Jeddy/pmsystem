<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id')->comment('产品ID');
            $table->string('name', 32)->comment('产品名');
            $table->text('description')->comment('产品描述');
            $table->unsignedInteger('ower_uid')->comment('产品负责人');
            $table->unsignedInteger('line_id')->comment('业务线ID');
            $table->boolean('status')->comment('状态，0有效，1无效');
            $table->timestamps();

            $table->foreign('line_id')->references('line_id')->on('lines');
            $table->foreign('ower_uid')->references('uid')->on('users');
        });
        \DB::statement("ALTER TABLE `products` comment '产品形态表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
