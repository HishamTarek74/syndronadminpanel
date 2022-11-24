<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "ad_name" => $this->ad->name,
            "reporter_name" => $this->reporter->name,
            'type' => $this->type,
            "note" => (string)$this->note ?? '',
        ];
    }
}
