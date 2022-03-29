<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            "concertId" => $this->concert_id,
            "concert" =>  new UserResource($this->whenLoaded('concert')),
            "price" => $this->price,
            "runningTime" => $this->running_time,
            "saleStartDate" => $this->sale_start_date,
            "saleEndDate" => $this->sale_end_date,
            "concertStartDate" => $this->concert_start_date,
            "concertEndDate" => $this->concert_end_date,
            "archiveEndTime" => $this->archive_end_time,
            "channelArn" => $this->channel_arn,
            "playbackUrl" => $this->playback_url,
            "streamKeyArn" => $this->stream_key_arn,
            "streamKeyValue" => $this->stream_key_value,
            "ingestEndpoint" => $this->ingest_endpoint,
            "timeMetaData" =>  json_decode($this->time_meta_data,false),
            "chats"=> ChatResource::collection($this->whenLoaded('chats')),
            "coinHistories"=> ChatResource::collection($this->whenLoaded('coinHistories')),
            "userTickets"=> ChatResource::collection($this->whenLoaded('userTickets'))
        ];
    }
}
