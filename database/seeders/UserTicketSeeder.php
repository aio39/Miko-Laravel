<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_ticket')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'concert_id' => 2,
                'ticket_id' => 3,
                'is_used' => 0,
                'p_ranking' => null,
                'g_ranking' => null,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'concert_id' => 1,
                'ticket_id' => 1,
                'is_used' => 1,
                'p_ranking' => 2,
                'g_ranking' => null,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'concert_id' => 3,
                'ticket_id' => 7,
                'is_used' => 0,
                'p_ranking' => null,
                'g_ranking' => null,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'concert_id' => 6,
                'ticket_id' => 15,
                'is_used' => 0,
                'p_ranking' => null,
                'g_ranking' => null,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'concert_id' => 4,
                'ticket_id' => 9,
                'is_used' => 1,
                'p_ranking' => 6,
                'g_ranking' => null,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'concert_id' => 5,
                'ticket_id' => 12,
                'is_used' => 1,
                'p_ranking' => 3,
                'g_ranking' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2,
                'concert_id' => 5,
                'ticket_id' => 12,
                'is_used' => 1,
                'p_ranking' => 2,
                'g_ranking' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 3,
                'concert_id' => 5,
                'ticket_id' => 12,
                'is_used' => 1,
                'p_ranking' => 1,
                'g_ranking' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 4,
                'concert_id' => 5,
                'ticket_id' => 12,
                'is_used' => 1,
                'p_ranking' => 4,
                'g_ranking' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 5,
                'concert_id' => 5,
                'ticket_id' => 12,
                'is_used' => 1,
                'p_ranking' => 5,
                'g_ranking' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'concert_id' => 1,
                'ticket_id' => 1,
                'is_used' => 0,
                'p_ranking' => 0,
                'g_ranking' => 0,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2,
                'concert_id' => 1,
                'ticket_id' => 1,
                'is_used' => 0,
                'p_ranking' => 0,
                'g_ranking' => 0,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 3,
                'concert_id' => 1,
                'ticket_id' => 1,
                'is_used' => 0,
                'p_ranking' => 0,
                'g_ranking' => 0,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 4,
                'concert_id' => 1,
                'ticket_id' => 1,
                'is_used' => 0,
                'p_ranking' => 0,
                'g_ranking' => 0,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 5,
                'concert_id' => 1,
                'ticket_id' => 1,
                'is_used' => 0,
                'p_ranking' => 0,
                'g_ranking' => 0,
            ],

        ]);
    }
}
