<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->increments('id');       //风险ID
            $table->string('p_id');         //项目ID
            $table->string('type_id');      //风险类型ID
            $table->string('creator_id');   //创建者ID
            $table->string('tracker_id')->nullable();   //跟踪者ID
            $table->string('content')->nullable();      //风险内容
            $table->string('condition');     //风险状态
            $table->string('possibility');  //风险可能性
            $table->string('effect');       //风险影响程度
            $table->string('trigger')->nullable();      //触发器
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
