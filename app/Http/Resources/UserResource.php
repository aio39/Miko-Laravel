<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "uuid" => $this->uuid,
            "name" => $this->name,
            "email" => $this->email,
            "emailVerifiedAt" => $this->email_verified_at,
            "avatar" => $this->password,
            "coin" => $this->avatar,
            "type" => $this->coin,
            "googleId" => $this->type,
            "twitterId" => $this->google_id,
            "chats" => ChatResource::collection($this->whenLoaded('chats')),
            "coinHistories" => ChatResource::collection($this->whenLoaded('coinHistories')),
            "concerts" => ChatResource::collection($this->whenLoaded('concerts')),
            "reviews" => ChatResource::collection($this->whenLoaded('reviews')),
            "userTickets" => ChatResource::collection($this->whenLoaded('userTickets'))
        ];
    }
}
