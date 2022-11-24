<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentRequestResource extends JsonResource
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
                "field" => $this->field,"status" => $this->status,"name" => $this->name,
            ];
        }

        return [
            'id' => $this->id,
            "field" => $this->field,
            "status" => $this->status,
            "name" => $this->name,
        ];
    }
}
