<?php

namespace App\Http\Resources;

use App\Models\OwnerRequest;
use App\Http\Resources\Countries\AreaResource;
use App\Http\Resources\Countries\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Categories\CategoryResource;

/** @mixin OwnerRequest */
class OwnerRequestResource extends JsonResource
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
            'status' => $this->status,
            
            'id_number' => $this->id_number,
            'user' => new CustomerResource($this->user),
            'created_at' => $this->created_at->toDateTimeString(),
            'created_at_formated' => $this->created_at->diffForHumans(),
        ];
    }
}
