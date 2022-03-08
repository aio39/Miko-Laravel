<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToConcerts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concerts', function (Blueprint $table) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE concerts ADD FULLTEXT concerts_fulltext_index (title, artist)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concerts', function (Blueprint $table) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE concerts DROP INDEX concerts_fulltext_index');
        });
    }
}
