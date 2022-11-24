<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PaymentCard */
class PaymentCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @throws \Laracasts\Presenter\Exceptions\PresenterException
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'card_owner' => $this->card_name,
            'card_number' => $this->card_number,
            'expire_date' => $this->expire_date,
            'created_at' => $this->created_at->toDateTimeString(),
            'created_at_formated' => $this->created_at->diffForHumans(),
            'image' => $this->getImage(),
            // 'user' => $this->type == 'customer' ? new CustomerResource($this->user) : $this->type == 'merchant' ? new MerchantResource($this->user) : new AdminResource($this->user),
        ];
    }
}
