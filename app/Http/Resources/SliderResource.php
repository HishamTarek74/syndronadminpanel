<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Countries\CountryResource;

class SliderResource extends JsonResource
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
                'image' => $this->getFirstMediaUrl(),
                //'url' => $this->url,
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'image' => $this->getFirstMediaUrl(),

            //'country' => new CountryResource($this->country)
        ];
    }
}
