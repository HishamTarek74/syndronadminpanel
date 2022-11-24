<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        if ($request->example_excel) {
            return [
                "name" => $this->name,
            ];
        }

        return [
            'id' => $this->id,
            "name" => $this->name,
            "type" => $this->type,
            'service_prices'=> ServicePriceResource::collection($this->prices)

        ];
    }
}
