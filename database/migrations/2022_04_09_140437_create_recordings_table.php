<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordings', function (Blueprint $table) {
            $table->id();
            $table->timestampTz('created_at')->useCurrent();
            $table->foreignId('ticket_id')->constrained();

            $table->string('prefix')->index();
            $table->string('stream_id')->index();
            $table->timestampTz('end')->nullable();
            $table->timestampTz('start');
            $table->boolean('avl_archive')->default(true);  // 시청자의 아카이브 시청 가능여부
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recordings');
    }
};
