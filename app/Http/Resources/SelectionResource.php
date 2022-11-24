<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SelectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'option_id' => $this->id,
            'option_name' => $this->name,
            'feature_id'=>$this->feature->id,
            'feature_name'=>$this->feature->name
        ];
    }
}
