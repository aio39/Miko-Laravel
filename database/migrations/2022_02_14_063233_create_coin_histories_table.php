<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('user_id')->unsigned()->index();
            $table->integer('concert_id')->unsigned()->index()->nullable();
            $table->integer('chat_id')->unsigned()->index()->nullable();

            $table->tinyInteger('type')->default(0); // 0  충전  / 1 슈퍼챗 / 2 굿즈 구입 / 3 아이템

            $table->integer('variation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coin_histories');
    }
}
