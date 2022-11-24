<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => $this->id,
            'order_no' => $this->order_no,
            'total_price' => $this->total_price,
            'user_id' => $this->user->name,
            'type' => $this->type,
            'description'=>$this->discription,
            'payment_method'=>$this->payment_method,
            'status'=>$this->status,
        ];
    }
}
