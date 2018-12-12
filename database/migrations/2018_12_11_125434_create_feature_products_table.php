<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('feature_id')->comment('需求ID');
            $table->unsignedInteger('product_id')->comment('产品ID');
            $table->boolean('status')->comment('状态，0有效，1无效');
            $table->timestamps();

            $table->foreign('feature_id')->references('feature_id')->on('features');
            $table->foreign('product_id')->references('product_id')->on('products');
        });
        \DB::statement("ALTER TABLE `feature_products` comment '需求-产品形态表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_products');
    }
}
