<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoTiAddedChatPerTimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "x" => $this->created_at,
            "y" => $this->added,
            "concertId" => $this->concert_id,
            "concert" =>  new ConcertResource($this->whenLoaded('concert')),
            "ticketId" => $this->ticket_id,
            "ticket" =>  new TicketResource($this->whenLoaded('ticket')),
        ];
    }
}
