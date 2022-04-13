<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTicketResource extends JsonResource
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
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
            "userId" => $this->user_id,
            "user" =>  new UserResource($this->whenLoaded('user')),
            "ticketId" => $this->ticket_id,
            "ticket" =>  new TicketResource($this->whenLoaded('ticket')),
            "concertId" => $this->concert_id,
            "concert" =>  new ConcertResource($this->whenLoaded('concert')),
            "isUsed" => $this->is_used,
            "pRanking" => $this->p_ranking,
            "gRanking" => $this->g_ranking,
            //            "concert" =>  new ConcertResource($this->whenLoaded('concert'))
        ];
    }
}
