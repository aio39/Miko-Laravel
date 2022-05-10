<?php

namespace App\Http\Resources;

use App\Models\Concert;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "concert" =>  new ConcertResource($this->whenLoaded('concert')),
            "price" => $this->price,
            "name" => $this->name,
            "detail" => $this->detail,
            "image" => $this->image,
            "stock" => $this->stock,
            "color" => $this->color,
            "size" => $this->size,
            "orderLimit" => $this->order_limit,
            "salesVolume" => $this->sales_volume,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}
