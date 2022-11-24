<?php

namespace App\Http\Resources;

use App\Models\Facility;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin  facility */
class FacilitySelectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' =>  $this->name,
        ];
    }
}
