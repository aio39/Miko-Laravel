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
        $coinHistories = [];
        $usersIDs = DB::table('users')->pluck('id');

        // 0  충전  / 1 티켓 구입 /  2 슈퍼챗 /  3 아이템  사용 / 4 굿즈 구입  / 5 티켓 판매 / 6 굿즈 판매  / 7 슈퍼챗을 받음 / 8 아이템을 받음 .
        // 일반 유저 소비.
        for ($i = 0; $i < 30; $i++) {
            $userData = [
                'created_at' => now(),
                'user_id' => $usersIDs->random(),
                'type' => mt_rand(0, 4),
                'variation' => mt_rand(1, 150) * 100,
            ];
            array_push($coinHistories, $userData);
        };

        // 스트리머
        for ($i = 0; $i < 30; $i++) {
            $streamerData = [
                'created_at' => now(),
                'user_id' => 1,
                'type' => mt_rand(5, 8),
                'variation' => mt_rand(1, 150) * 100,
            ];
            array_push($coinHistories, $streamerData);
        };

        DB::table('coin_histories')->insert($coinHistories);
    }
}
