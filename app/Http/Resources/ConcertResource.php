<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConcertResource extends JsonResource
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
            "categoryId" => $this->category_id,
            "category" =>  new CategoryResource($this->whenLoaded('category')),
            "userId" => $this->user_id,
            "user" =>  new UserResource($this->whenLoaded('user')),
            "coverImage" => $this->cover_image,
            "title" => $this->title,
            "artist" => $this->artist,
            "detail" => $this->detail,
            "content" => $this->content,
            "isPublic" => $this->is_public,
            "allConcertStartDate" => $this->all_concert_start_date,
            "allConcertEndDate" => $this->all_concert_end_date,
            "channelArn" => $this->channel_arn,
            "playbackUrl" => $this->playback_url,
            "streamKeyArn" => $this->stream_key_arn,
            "streamKeyValue" => $this->stream_key_value,
            "tickets" =>  TicketResource::collection($this->whenLoaded('tickets'))
        ];
    }
}
