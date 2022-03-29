<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\ConcertResource;
use App\Http\Resources\TicketCollection;
use App\Http\Resources\TicketResource;
use App\Models\Concert;
use App\Models\Ticket;
use Illuminate\Http\Request;
use function App\Helper\applyDefaultFindById;
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

        return new TicketCollection($query->paginate($request->get('per_page') ?: 40));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTicketRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $concert_id = $request->concert_id;

        $concert = Concert::query()->findOrFail($concert_id);

        $ticket = $concert->tickets()->create($request->all());

        return (new TicketResource($ticket))->response();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $query = Ticket::query();

        $query = applyDefaultFindById($request, $query);

        return (new TicketResource($query->findOrFail($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTicketRequest $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->fill($request->all());
        $ticket->updateOrFail();
        $ticket->time_meta_data = json_encode($ticket->time_meta_data);
        return  new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
