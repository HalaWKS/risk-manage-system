<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskupdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riskupdate', function (Blueprint $table) {
            $table->increments('id');       //更新记录ID
            $table->string('r_id');         //风险ID
            $table->string('u_id');         //更新者ID
            $table->string('content')->nullable();      //更新内容(add/update/delete)
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
