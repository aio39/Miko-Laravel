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
            $table->timestampTz('created_at');

            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('ticket_id')->unsigned()->index()->nullable();
            $table->bigInteger('concert_id')->unsigned()->index()->nullable();
            $table->bigInteger('product_id')->unsigned()->index()->nullable();
            $table->bigInteger('chat_id')->unsigned()->index()->nullable();

            $table->tinyInteger('type')->default(0); // 0  충전  / 1 티켓 구입 /  2 슈퍼챗 /  3 아이템  사용 / 4 굿즈 구입  / 5 티켓 판매 / 6 굿즈 판매  / 7 슈퍼챗을 받음 / 8 아이템을 받음 .

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
