<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountPromotionResource extends JsonResource
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
                "start" => $this->start,
                "end" => $this->end,
            ];
        }

        return [
            'id' => $this->id,
            "user_name" => $this->user->name,
            'phone' => $this->user->phone,
            'type' => $this->user->type,
            "start" => $this->start,
            "end" => $this->end,
        ];
    }
}
