<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
                'name' => $this->name,
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->getImage() ?? asset('images/avatar.png'),
        ];
    }
       /**
     * @return string
     */
    public function getImage()
    {
        if ($this->resource instanceof HasMedia) {
            return $this->getFirstMediaUrl();
        }
    }
}
