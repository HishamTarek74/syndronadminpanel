<?php

namespace App\Http\Resources\Excel;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\Countries\AreaResource;
use App\Http\Resources\Countries\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Countries\CountryResource;

class AdResource extends JsonResource
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
                'description' => strip_tags($this->description),
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => strip_tags($this->description),
            'price' => $this->price,
            'views' => $this->views,
            'type' => $this->type,
            'category' => $this->category->name,
            'country' => $this->country->name,
            'city' => $this->city->name,
            'area' => $this->area->name, 
            'user' => $this->user->name
        ];
    }
}
