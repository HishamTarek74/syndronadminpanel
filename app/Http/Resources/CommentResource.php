<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Pages\Entities */
class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'user_name' => $this->user->name,
            'user_type' => $this->user->type,
            'user_email' => $this->user->email,
            'user_avatar' => $this->user->getAvatar(),
            'created_at' => $this->created_at,
            'replies'=>CommentReplayResource::collection($this->replies->sortByDesc('created_at'))
        ];
    }
}
