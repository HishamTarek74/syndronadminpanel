<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
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
                "balance" => $this->balance,
            ];
        }

        return [
            'id' => $this->id,
            "balance" => $this->balance,
        ];
    }
}
