<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createCoTiCurEnterUserNumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_ti_cur_enter_user_nums', function (Blueprint $table) {
            $table->id();
            $table->timestampTz('created_at')->useCurrent()->useCurrentOnUpdate();;
            $table->bigInteger('ticket_id')->unsigned()->index();
            $table->bigInteger('concert_id')->unsigned()->index();
            $table->integer('nums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_ti_cur_enter_user_nums');
    }
};
