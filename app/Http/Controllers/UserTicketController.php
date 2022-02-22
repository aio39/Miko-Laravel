<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\StoreUserTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Requests\UpdateUserTicketRequest;
use App\Http\Resources\UserTicketCollection;
use App\Http\Resources\UserTicketResource;
use App\Models\CoinHistory;
use App\Models\Concert;
use App\Models\Ticket;
use App\Models\User;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function App\Helper\applyDefaultFSW;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = UserTicket::query();
        $query = applyDefaultFSW($request, $query);

        return new UserTicketCollection($query->paginate($request->get('per_page') ?: 40));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTicketRequest $request)
    {
        // TODO 중복 구매 막기

        $ticket_id = $request->ticket_id;

        $user = Auth::user();
        $user_id = $user->id;

        $ticket = Ticket::query()->with('concert')->findOrFail($ticket_id);
        $concert = $ticket->concert;

        // 코인이 부족하면 실패
        if($user-> coin < $ticket->price) {
            return response()->json("fail",401);
        }

        DB::beginTransaction();

        try {
            $user_ticket = UserTicket::create(["user_id" => $user_id, "ticket_id" => $ticket->id]);

            User::query()->where('id', Auth::id())->decrement('coin', $ticket->price);

            $coin_history_data = ["user_id"=> $user_id, "ticket_id" => $ticket->id, "type"=>  1 , "variation" => -($ticket->price) ] ;
            CoinHistory::create($coin_history_data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw  $e;
        }

        return (new UserTicketResource($user_ticket));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $user_ticket
     * @return \Illuminate\Http\Response
     */
    public function show(UserTicket $user_ticket)
    {
        return (new UserTicketResource($user_ticket));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
