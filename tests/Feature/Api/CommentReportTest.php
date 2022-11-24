<?php

use App\Models\CommentReport;
use App\Models\User;

test('store comment report', function () {
    $user = User::factory()->create();
    $data = CommentReport::factory(['reporter_id' => $user->id,'description'=>'any text'])->raw();
    $this->actingAs($user)
        ->postJson(
            route('api.comments.report.store'),
            $data
        )
        ->assertStatus(200);
    $this->assertDatabaseHas(CommentReport::class, $data);
});
test('validate comment report store request', function () {
    $user = User::factory()->create();
    $data = CommentReport::factory(['reporter_id' => $user->id])->raw();
    $this->actingAs($user)
        ->postJson(
            route('api.comments.report.store'),
            Arr::prepend($data, 'random', 'type') + ['description'=>'any text']
        )
        ->assertStatus(422)
        ->assertJsonValidationErrorFor('type');

    $this->actingAs($user)
        ->postJson(
            route('api.comments.report.store'),
            CommentReport::factory(['reporter_id' => $user->id,'type'=>CommentReport::OTHER_TYPE,'description'=>null])->raw()
        )
        ->assertStatus(422)
        ->assertJsonValidationErrorFor('description');
});
