<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
                "code" => $this->code,"due_date" => $this->due_date,"percentage" => $this->percentage,"type" => $this->type,"max_commision" => $this->max_commision,"hide_max_sales" => $this->hide_max_sales,"usage_times" => $this->usage_times,"status" => $this->status,
            ];
        }

        return [
            'id' => $this->id,
            "code" => $this->code,"due_date" => $this->due_date,"percentage" => $this->percentage,"type" => $this->type,"max_commision" => $this->max_commision,"hide_max_sales" => $this->hide_max_sales,"usage_times" => $this->usage_times,"status" => $this->status,
        ];
    }
}
