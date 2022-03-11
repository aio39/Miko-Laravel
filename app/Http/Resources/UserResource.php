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
            "password" => $this->password,
            "avatar" => $this->avatar,
            "coin" => $this->coin,
            "type" => $this->type,
            "googleId" => $this->googleId,
            "twitterId" => $this->twitterId,
            "chats" => ChatResource::collection($this->whenLoaded('chats')),
            "coinHistories" => ChatResource::collection($this->whenLoaded('coinHistories')),
            "concerts" => ChatResource::collection($this->whenLoaded('concerts')),
            "reviews" => ChatResource::collection($this->whenLoaded('reviews')),
            "userTickets" => ChatResource::collection($this->whenLoaded('userTickets'))
        ];
    }
}
