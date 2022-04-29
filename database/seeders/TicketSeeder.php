<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 현재 콘서트 시작 1분 전
        $startConcert = Carbon::now()->add(1, 'minute'); // 콘서트 끝나는 날, 판매 만료 날짜랑 같은 날
        $endConcert = Carbon::now()->add(3, 'minute');
        $endArchive = Carbon::now()->add(3, 'minute')->add(5, 'minute');

        DB::table('tickets')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => 100,
                'running_time' => 130,
                'sale_start_date' => '2021-06-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => '2023-12-17 00:00:00', // 판매종료 날짜
                'concert_start_date' => '2022-01-17 07:00:00', // 콘서트시작 날짜
                'concert_end_date' => '2022-12-17 10:00:00', // 콘서트종료 날짜
                'archive_end_time' => '2023-12-17 00:00:00', // 다시보기 기간
                'channel_arn' => env('channel_arn'),
                'playback_url' => env('playback_url'),
                'stream_key_arn' => env('stream_key_arn'),
                'stream_key_value' => env('stream_key_value'),
                'ingest_endpoint' => env('ingest_endpoint'),
                'sales_volume' => 5,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => 120,
                'running_time' => 180,
                'sale_start_date' => '2021-06-17 00:00:00', // 판매시작 날짜
                'sale_end_date' => $endConcert, // 판매종료 날짜
                'concert_start_date' => $startConcert, // 콘서트시작 날짜
                'concert_end_date' => $endConcert, // 콘서트종료 날짜
                'archive_end_time' => $endArchive, // 다시보기 기간
                'channel_arn' => env('channel_arn'),
                'playback_url' => env('playback_url'),
                'stream_key_arn' => env('stream_key_arn'),
                'stream_key_value' => env('stream_key_value'),
                'ingest_endpoint' => env('ingest_endpoint'),
                'sales_volume' => 3,
            ],
        ]);

        $ticketData = [];
        $concertsIDs = DB::table('concerts')->pluck('id');

        // 판매 예정
        $planSaleStartDate = Carbon::now()->add(1, 'month'); // 판매 시작
        $planSaleEndDate = Carbon::now()->add(1, 'month')->add(1, 'year'); // 판매 끝나는 날, 판매 시작일 기준 1년 후까지
        $planStartDate = Carbon::now()->add(1, 'month')->add(4, 'month'); // 콘서트 시작, 판매 시작일 기준 6개월 후
        $planEndDate = Carbon::now()->add(1, 'month')->add(1, 'year'); // 콘서트 끝나는 날, 판매 만료 날짜랑 같은 날
        $planArchiveEndDate = Carbon::now()->add(1, 'month')->add(1, 'year')->add(1, 'year'); // 다시보기, 콘서트 끝나는 날 기준 1년 후.

        for ($i = 0; $i < $concertsIDs->count(); $i++) {
            $planTicket = [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => $concertsIDs[$i],
                'price' => mt_rand(1, 200) * 100,
                'running_time' => mt_rand(1, 20) * 10,
                'sale_start_date' => $planSaleStartDate, // 판매시작 날짜
                'sale_end_date' => $planSaleEndDate, // 판매종료 날짜
                'concert_start_date' => $planStartDate, // 콘서트시작 날짜
                'concert_end_date' => $planEndDate, // 콘서트종료 날짜
                'archive_end_time' => $planArchiveEndDate, // 다시보기 기간
                'sales_volume' => mt_rand(0, 100),
            ];
            array_push($ticketData, $planTicket);
        };

        // 판매 중
        $onSaleStart1 = Carbon::now()->sub(3, 'month');
        $onSaleStart2 = Carbon::now()->sub(6, 'month');
        $onSaleStartDate = [$onSaleStart1, $onSaleStart2]; // 판매 시작

        $onSaleEnd1 = Carbon::now()->sub(3, 'month')->add(1, 'year');
        $onSaleEnd2 = Carbon::now()->sub(6, 'month')->add(1, 'year');
        $onSaleEndDate = [$onSaleEnd1, $onSaleEnd2]; // 판매 끝나는 날, 판매 시작일 기준 1년 후까지

        $onStart1 = Carbon::now()->sub(3, 'month')->add(6, 'month');
        $onStart2 = Carbon::now()->sub(6, 'month')->add(6, 'month');
        $onStartDate = [$onStart1, $onStart2]; // 콘서트 시작, 판매 시작일 기준 6개월 후

        $onEnd1 = Carbon::now()->sub(3, 'month')->add(1, 'year');
        $onEnd2 = Carbon::now()->sub(6, 'month')->add(1, 'year');
        $onEndDate =  [$onEnd1, $onEnd2]; // 콘서트 끝나는 날, 판매 만료 날짜랑 같은 날

        $onArchiveEnd1 = Carbon::now()->sub(3, 'month')->add(1, 'year')->add(1, 'year');
        $onArchiveEnd2 = Carbon::now()->sub(6, 'month')->add(1, 'year')->add(1, 'year');
        $onArchiveEndDate = [$onArchiveEnd1, $onArchiveEnd2]; // 다시보기, 콘서트 끝나는 날 기준 1년 후.

        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < $concertsIDs->count(); $j++) {
                $onTicket = [
                    'created_at' => now(),
                    'updated_at' => now(),
                    'concert_id' => $concertsIDs[$j],
                    'price' => mt_rand(1, 200) * 100,
                    'running_time' => mt_rand(1, 20) * 10,
                    'sale_start_date' => $onSaleStartDate[$i], // 판매시작 날짜
                    'sale_end_date' => $onSaleEndDate[$i], // 판매종료 날짜
                    'concert_start_date' => $onStartDate[$i], // 콘서트시작 날짜
                    'concert_end_date' => $onEndDate[$i], // 콘서트종료 날짜
                    'archive_end_time' => $onArchiveEndDate[$i], // 다시보기 기간
                    'sales_volume' => mt_rand(0, 100),
                ];
                array_push($ticketData, $onTicket);
            };
        };

        // 판매 지남
        $outSaleStartDate = Carbon::now()->sub(1, 'year')->sub(1, 'month'); // 판매 시작
        $outSaleEndDate = Carbon::now()->sub(1, 'year')->sub(1, 'month')->add(1, 'year'); // 판매 끝나는 날, 판매 시작일 기준 1년 후까지
        $outStartDate = Carbon::now()->sub(1, 'year')->sub(1, 'month')->add(6, 'month'); // 콘서트 시작, 판매 시작일 기준 6개월 후
        $outEndDate = Carbon::now()->sub(1, 'year')->sub(1, 'month')->add(1, 'year'); // 콘서트 끝나는 날, 판매 만료 날짜랑 같은 날
        $outArchiveEndDate = Carbon::now()->sub(1, 'year')->sub(1, 'month')->add(1, 'year')->add(1, 'year'); // 다시보기, 콘서트 끝나는 날 기준 1년 후.

        for ($i = 0; $i < $concertsIDs->count(); $i++) {
            $outTicket = [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => $concertsIDs[$i],
                'price' => mt_rand(1, 200) * 100,
                'running_time' => mt_rand(1, 20) * 10,
                'sale_start_date' => $outSaleStartDate, // 판매시작 날짜
                'sale_end_date' => $outSaleEndDate, // 판매종료 날짜
                'concert_start_date' => $outStartDate, // 콘서트시작 날짜
                'concert_end_date' => $outEndDate, // 콘서트종료 날짜
                'archive_end_time' => $outArchiveEndDate, // 다시보기 기간
                'sales_volume' => mt_rand(0, 100),
            ];
            array_push($ticketData, $outTicket);
        };


        DB::table('tickets')->insert($ticketData);
    }
}
