<?php

namespace App\Http\Resources;

use App\Models\Ad;
use App\Http\Resources\Countries\AreaResource;
use App\Http\Resources\Countries\CityResource;
use App\Http\Resources\Countries\CountryResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'description' => $this->description,
            'price' => $this->price,
            'views' => (int)$this->views,
            'type' => $this->type,
            'image' => $this->getImages(),
            'selection' => SelectionResource::collection($this->selections),
            'category' => new CategoryResource($this->category),
            'country' => new CountryResource($this->country),
            'city' => new CityResource($this->city),
            'area' => new AreaResource($this->area),
            'user' => new CustomerResource($this->user),
            'hide_contacts'=>(boolean)$this->hide_contacts,
            'disable_comments'=>(boolean)$this->disable_comments,
            'created_at'=>$this->created_at->toDateString(),
            'active_from'=>$this->active_from,
            'ended_in'=>$this->ended_in,
            'is_favorite'=>$this->is_favorite
        ];
    }
}
