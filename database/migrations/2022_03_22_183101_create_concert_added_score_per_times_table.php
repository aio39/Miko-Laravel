<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// NOTE migraton 파일명을 CamelCase로 전환했을때 동일하지 않으면 에러
class CreateConcertAddedScorePerTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concert_added_score_per_times', function (Blueprint $table) {
            $table->id();
            $table->timestampTz('created_at')->useCurrent()->useCurrentOnUpdate();;
            $table->bigInteger('ticket_id')->unsigned()->index();
            $table->bigInteger('concert_id')->unsigned()->index();
            $table->integer('added_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concert_added_score_per_times');
    }
}
