<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coin_histories')->insert([
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 0,
                'variation' => 5000,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 0,
                'variation' => 500,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 0,
                'variation' => 5000,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 1,
                'variation' => 500,
            ], [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 1,
                'variation' => 1000,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 0,
                'variation' => 2000,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 2,
                'variation' => 3000,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 0,
                'variation' => 2000,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 0,
                'variation' => 1000,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 3,
                'variation' => 2200,
            ],
            [
                'created_at' => now(),
                'user_id' => 1,
                'type' => 4,
                'variation' => 200,
            ],
            [
                'created_at' => now(),
                'user_id' => 2,
                'type' => 0,
                'variation' => 300,
            ],
        ]);
    }
}
