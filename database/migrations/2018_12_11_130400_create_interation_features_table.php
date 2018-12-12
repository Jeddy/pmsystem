<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterationFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interation_features', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('interation_id')->comment('迭代ID');
            $table->unsignedInteger('product_id')->comment('产品ID');
            $table->unsignedInteger('feature_id')->comment('需求ID');
            $table->boolean('status')->comment('状态，0有效，1无效');
            $table->timestamps();

            $table->foreign('interation_id')->references('interation_id')->on('interations');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('feature_id')->references('feature_id')->on('features');
        });
        \DB::statement("ALTER TABLE `interation_features` comment '产品需求表（迭代需求表）'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interation_features');
    }
}
