<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
                'id' => $this->id,
                'name' => $this->name,
                'description' => strip_tags($this->description),
                'price' => $this->price,
                'category' => $this->category->name,
                'store' => $this->store->name
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => strip_tags($this->description),
            'price' => $this->price,
            'category' => $this->category->name,
            'store' => $this->store->name
        ];
    }
}
