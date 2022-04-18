<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createCoTiAmountDonePerTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_ti_amount_done_per_times', function (Blueprint $table) {
            $table->id();
            $table->timestampTz('created_at')->useCurrent()->useCurrentOnUpdate();;
            $table->bigInteger('ticket_id')->unsigned()->index();
            $table->bigInteger('concert_id')->unsigned()->index();
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_ti_amount_done_per_times');
    }
};
