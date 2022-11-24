<?php

use App\Http\Resources\CommentReplayResource;
use App\Models\Comment;
use App\Models\CommentReplay;
use App\Models\User;
use App\Models\Ad;
use App\Http\Resources\AdResource;

test('store new comment', function () {
    $user = User::factory()->create();
    $comment = Comment::factory()->raw();
    $this->actingAs($user)
        ->postJson(
            route('api.comments.store'),
            $comment
        )
        ->assertSuccessful()
        ->assertJsonStructure(
            [
                'data' => [
                    'id',
                    'comment',
                    'user_name',
                    'user_type',
                    'user_email',
                    'user_avatar',
                    'created_at',
                    'replies'
                ]
            ]
        );
});
test('store new comment replay', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->postJson(
            route('api.comments.replay.store'),
            CommentReplay::factory(['user_id' => $user->id])->raw()
        )
        ->assertSuccessful()
        ->assertJsonStructure(
            [
                'data' => [
                    'id',
                    'replay',
                    'user_name',
                    'user_email',
                    'user_avatar',
                    'created_at',
                ]
            ]
        );
});
test('each ad has comments and each comment has many replies', function () {
    $ad = Ad::factory()->create();
    $comment = Comment::factory(['ad_id' => $ad->id])->create();
    CommentReplay::factory()->count(10)->for($comment)->create();
    $adResource = new AdResource($ad);
    expect($adResource->comments)
        ->toHaveCount(1)
        ->and($adResource->comments[0]['replies'])
        ->toHaveCount(10)
        ->and($adResource->comments[0]['replies'][0]['comment_id'])->not->toBeNull();
});
