<?php

namespace App\Http\Resources;

use App\Http\Resources\Packages\PackageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BankTransferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'bank_name' => $this->bank_name,
            'date' => $this->date,
            'amount' => $this->amount,
        ];
    }
}
