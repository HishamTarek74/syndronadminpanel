<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderRequestResource extends JsonResource
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
                "status" => $this->status,
                'customer' => $this->customer->name,
                'ad' => $this->ad->name

            ];
        }
        return [
            'id' => $this->id,
            'customer' => $this->customer->name,
            'ad' => $this->ad->name,
            "status" => $this->status,
        ];
    }
}
