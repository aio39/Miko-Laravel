<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->string('cover_image');
            $table->string('title');
            $table->string('artist');
            $table->string('detail');
            $table->longText('content')->nullable();

            $table->boolean('is_public')->default(false);

            $table->timestampTz('all_concert_start_date',0);
            $table->timestampTz('all_concert_end_date',0);




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concerts');
    }
}
