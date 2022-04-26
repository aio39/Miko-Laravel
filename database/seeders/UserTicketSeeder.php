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
        $concertsIDs = DB::table('concerts')->pluck('id');
        $ticketsIDs = DB::table('tickets')->pluck('id');
        $usersIDs = DB::table('users')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('user_ticket')->insert([
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $usersIDs->random(),
                'concert_id' => $concertsIDs->random(),
                'ticket_id' => $ticketsIDs->random(),
                'is_used' => mt_rand(0, 1),
                'p_ranking' => null,
                'g_ranking' => null,
            ]);
        }
    }
}
