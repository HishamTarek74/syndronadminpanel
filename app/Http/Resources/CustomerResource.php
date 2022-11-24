<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\AdRequestReview;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Customer */
class CustomerResource extends JsonResource
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
        if ($request->example_excel) {
            return [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ];
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'type' => $this->type,
           // 'reviews' =>AdRequestReviewResource::collection($this->reviews),
            'reviews_count' => count($this->reviews),
            'reviews_avg' => AdRequestReview::where('advertiser_id', $this->id)->avg('review'),
            'comments_count' => count($this->comments),
            'latest_comments' => CommentResource::collection($this->latest_comments),
            'avatar' => $this->getAvatar(),
            'localed_type' => $this->present()->type,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'created_at_formatted' =>  $this->created_at ? $this->created_at->diffForHumans() : null,
        ];
    }
}
