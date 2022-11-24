<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Countries\CountryResource;

class ScreenIconResource extends JsonResource
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
                'store' => $this->user->name,
                'icon' => $this->getFirstMediaUrl(),
            ];
        }

        return [
            'id' => $this->id,
            'store' => $this->user->name,
            'icon' => $this->getFirstMediaUrl(),
        ];
    }
}
