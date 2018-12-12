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
            $table->string('contact_name', 32)->comment('联系人');
            $table->string('contact_phone', 16)->comment('联系人手机');
            $table->boolean('status')->comment('状态，0有效，1 锁定，2 作废')->default(0);
            $table->timestamps();
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
