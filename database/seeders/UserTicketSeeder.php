<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticketsIDs = DB::table('tickets')->pluck('id');
        $usersIDs = DB::table('users')->pluck('id');
        $now = Carbon::now()->format('Y-m-d h:i');

        $userTicketData = [];

        for ($i = 0; $i < $usersIDs->count(); $i++) {
            $concertID = Ticket::find(1)->concert->id;

            $userTicket1 = [
                'created_at' => $now,
                'updated_at' => $now,
                'user_id' => $usersIDs[$i],
                'concert_id' => $concertID,
                'ticket_id' => 1,
                'is_used' => 0,
                'p_ranking' => null,
                'g_ranking' => null,
            ];
            array_push($userTicketData, $userTicket1);
        };

        for ($i = 0; $i < 10; $i++) {
            $ticketID = $ticketsIDs->random();
            $concertID = Ticket::find($ticketID)->concert->id;

            $userTicket = [
                'created_at' => $now,
                'updated_at' => $now,
                'user_id' => $usersIDs->random(),
                'concert_id' => $concertID,
                'ticket_id' => $ticketID,
                'is_used' => mt_rand(0, 1),
                'p_ranking' => null,
                'g_ranking' => null,
            ];
            array_push($userTicketData, $userTicket);
        };


        // user_id, ticket_id
        $uniqueUserTicketData = array_unique($userTicketData, SORT_REGULAR);
        DB::table('user_ticket')->insert($uniqueUserTicketData);
    }
}
