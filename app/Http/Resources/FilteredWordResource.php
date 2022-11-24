<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilteredWordResource extends JsonResource
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
                "keyword" => $this->keyword,
            ];
        }

        return [
            'id' => $this->id,
            "keyword" => $this->keyword,
        ];
    }
}
