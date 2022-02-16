<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Concert;
use App\Models\Ticket;
use Illuminate\Http\Request;
use function App\Helper\applyDefaultFSW;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Ticket::query();
        $query = applyDefaultFSW($request, $query);

        $q = $request->get('search');   // 검색
        // Fulltext * 부분 제외 -  " " 로 묶으면 단어 합치기
        if ($q) {
            $query->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", $q);
        }

        return $query->paginate($request->get('per_page') ?: 40);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $concert_id = $request->concert_id;

        $concert = Concert::query()->findOrFail($concert_id);

        $ticket = $concert->tickets()->create($request->all());

        return  response()->json($ticket,201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return response()->json($ticket);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
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
