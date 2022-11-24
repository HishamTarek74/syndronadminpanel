<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
                "id" => $this->id,
                "description" => $this->description,
            ];
        }

        return [
            "id" => $this->id,
            "description" => $this->description,
        ];
    }
}
