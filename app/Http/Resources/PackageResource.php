<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'id'            => $this->id,
            'title'         => $this->title,
            'duration'      => $this->duration,
            'price'         => $this->price,
            'vip_no'        => $this->vip_no,
            'special_no'    => $this->special_no,
            'promotion_id ' => $this->promotion_id ,
            'features'      => PackageFeatureResource::collection($this->features)
        ];
    }
}
