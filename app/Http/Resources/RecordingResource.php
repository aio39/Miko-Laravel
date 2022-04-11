<?php

namespace App\Http\Resources;

use App\Models\Concert;
use App\Models\Ticket;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "ticketId" => $this->ticket_id,
            "ticket" =>  new TicketResource($this->whenLoaded('ticket')),
            "prefix" => $this->prefix,
            "stream_id" => $this->stream_id,
            "end" => $this->end,
            "start" => $this->start,
            "avl_archive" => $this->avl_archive,
            "createdAt" => $this->created_at,
        ];
    }
}
