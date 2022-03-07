<?php

namespace App\Http\Resources;

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
            "concert_id" => $this->concert_id,
            "concert" =>  new UserResource($this->whenLoaded('concert')),
            "price" => $this->price,
            "name" => $this->name,
            "detail" => $this->detail,
            "image" => $this->image,

        ];
    }
}
