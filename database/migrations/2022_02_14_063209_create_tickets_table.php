<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('concert_id')->index();

            $table->unsignedInteger('price');
            $table->unsignedSmallInteger('running_time');

            $table->timestampTz('sale_start_date');
            $table->timestampTz('sale_end_date');
            $table->timestampTz('concert_start_date');
            $table->timestampTz('concert_end_date');
            $table->timestampTz('archive_end_time');
//            $table->unsignedBigInteger('remainTicket')->nullable();
            $table->string('channel_arn')->nullable();
            $table->string('playback_url')->nullable();
            $table->string('stream_key_arn')->nullable();
            $table->string('stream_key_value')->nullable();
            $table->string('ingest_endpoint')->nullable();

            $table->json('time_meta_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
