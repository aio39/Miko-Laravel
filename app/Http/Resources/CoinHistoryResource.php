<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoinHistoryResource extends JsonResource
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
            "Id" => $this->id,
            "userId" => $this->user_id,
            "user" =>  new UserResource($this->whenLoaded('user')),
            "ticketId" => $this->ticket_id,
            "ticket" =>  new TicketResource($this->whenLoaded('ticket')),
            "chatId" => $this->chat_id,
            "chat" =>  new ChatResource($this->whenLoaded('chat')),
            "type" => $this->type,
            "variation" => $this->variation,
        ];
    }
}
