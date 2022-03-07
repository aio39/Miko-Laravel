<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
            "userId" => $this->user_id,
            "user" =>  new UserResource($this->whenLoaded('user')),
            "ticketId" => $this->ticket_id,
            "ticket" =>  new TicketResource($this->whenLoaded('ticket')),
            "text" => $this->text,
        ];
    }
}
