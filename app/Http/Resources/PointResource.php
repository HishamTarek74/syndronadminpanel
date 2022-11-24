<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PointResource extends JsonResource
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
                "action" => $this->action,"points" => $this->points,
            ];
        }

        return [
            'id' => $this->id,
            "action" => $this->action,"points" => $this->points,
        ];
    }
}
