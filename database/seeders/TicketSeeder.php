<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $startDate = Carbon::now('Asia/Seoul')->add(2, 'minute');
        $endDate = Carbon::now('Asia/Seoul')->add(4, 'minute');

        DB::table('tickets')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => 100,
                'running_time' => 130,
                'sale_start_date' => '1997-06-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2025-12-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-01-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-12-17 10:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-12-17 00:00:00', // 다시보기 기간
                'channel_arn' => env('channel_arn'),
                'playback_url' => env('playback_url'),
                'stream_key_arn' => env('stream_key_arn'),
                'stream_key_value' => env('stream_key_value'),
                'ingest_endpoint' => env('ingest_endpoint'),
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => 100,
                'running_time' => 180,
                'sale_start_date' => '2022-06-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2025-12-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-01-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-12-17 10:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-12-17 00:00:00', // 다시보기 기간
                'channel_arn' => env('channel_arn'),
                'playback_url' => env('playback_url'),
                'stream_key_arn' => env('stream_key_arn'),
                'stream_key_value' => env('stream_key_value'),
                'ingest_endpoint' => env('ingest_endpoint'),
            ],
        ]);

        DB::table('tickets')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 2,
                'price' => 13000,
                'running_time' => 180,
                'sale_start_date' => '2022-03-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-12-18 00:00:00', // 판매종료 날짜
                'concert_start_date' => $startDate, // 콘서트시작 날짜
                'concert_end_date' => '2022-12-18 10:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-12-18 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 2,
                'price' => 13000,
                'running_time' => 180,
                'sale_start_date' => '2022-01-17 00:00:00', // 판매시작 날짜
                'sale_end_date' =>  $endDate, // 판매종료 날짜
                'concert_start_date' => '2022-3-30 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => $endDate, // 콘서트종료 날짜
                'archive_end_time' => '2023-12-19 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 2,
                'price' => 13000,
                'running_time' => 180,
                'sale_start_date' => '2022-06-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-12-20 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-12-20 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-12-20 10:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-12-20 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 3,
                'price' => 5800,
                'running_time' => 120,
                'sale_start_date' => '2021-06-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-04-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-04-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-04-17 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-04-17 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 3,
                'price' => 5800,
                'running_time' => 120,
                'sale_start_date' => '2021-06-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-04-19 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-04-19 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-04-19 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-04-19 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 3,
                'price' => 5800,
                'running_time' => 120,
                'sale_start_date' => '2021-06-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-04-22 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-04-22 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-04-22 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-04-22 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 4,
                'price' => 4300,
                'running_time' => 90,
                'sale_start_date' => '2022-01-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-06-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-06-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-06-17 08:30:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-06-17 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 4,
                'price' => 4300,
                'running_time' => 90,
                'sale_start_date' => '2022-01-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-06-18 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-06-18 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-06-18 08:30:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-06-18 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 5,
                'price' => 5900,
                'running_time' => 120,
                'sale_start_date' => '2021-09-07 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-03-07 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-03-07 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-03-07 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-03-07 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 5,
                'price' => 5900,
                'running_time' => 120,
                'sale_start_date' => '2021-09-07 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-03-08 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-03-08 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-03-08 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-03-08 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 5,
                'price' => 5900,
                'running_time' => 120,
                'sale_start_date' => '2021-09-07 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-03-09 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-03-09 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-03-09 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-03-09 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 6,
                'price' => 5000,
                'running_time' => 120,
                'sale_start_date' => '2021-09-07 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-02-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => ' 2022-02-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-02-17 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-02-17 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 6,
                'price' => 5000,
                'running_time' => 120,
                'sale_start_date' => '2021-09-07 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-03-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-03-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-03-17 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-03-17 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 6,
                'price' => 5000,
                'running_time' => 120,
                'sale_start_date' => '2021-09-07 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-04-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-04-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-04-17 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-04-17 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 6,
                'price' => 5000,
                'running_time' => 120,
                'sale_start_date' => '2021-09-07 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-05-19 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-05-19 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-05-19 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-05-19 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 7,
                'price' => 5000,
                'running_time' => 120,
                'sale_start_date' => '2022-01-07 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-07-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-07-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-07-17 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-07-17 00:00:00', // 다시보기 기간
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 8,
                'price' => 3800,
                'running_time' => 60,
                'sale_start_date' => '2022-01-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2022-10-17 07:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-10-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-10-17 09:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-10-17 00:00:00', // 다시보기 기간
            ],
        ]);
    }
}
