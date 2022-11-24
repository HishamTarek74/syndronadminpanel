<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
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
                'name' => $this->name,
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'selection_type' => $this->selection_type,
            'options'=>OptionResource::collection($this->options)
        ];
    }
}
