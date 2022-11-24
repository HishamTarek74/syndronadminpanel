<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentReplayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'comment_id'=>$this->comment->id,
            'replay'=>$this->replay,
            'user_name' => $this->user->name,
            'user_email' => $this->user->email,
            'user_avatar' => $this->user->getAvatar(),
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}
