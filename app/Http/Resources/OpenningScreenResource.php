<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Countries\CountryResource;

class OpenningScreenResource extends JsonResource
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
                'url' => $this->url,
            ];
        }

        return [
            'id' => $this->id,
            'url' => $this->url,
            'country' => new CountryResource($this->country),
            'city' => new cityResource($this->city),
        ];
    }
}
