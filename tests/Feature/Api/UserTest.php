<?php

namespace Tests\Feature\Api;

use App\Models\Ad;
use App\Models\User;

it('select2 api', function () {
    User::factory()->count(5)->create();
    $response = $this->getJson(route('api.users.select'))
        ->assertSuccessful()
        ->assertJsonStructure([
                                  'data' => [
                                      '*' => ['id', 'text', 'image'],
                                  ],
                              ]);

    $this->assertEquals($response->json('data.0.id'), 1);

    $this->assertCount(5, $response->json('data'));

    $response = $this->getJson(route('api.users.select', ['selected_id' => 4]))
        ->assertSuccessful()
        ->assertJsonStructure([
                                  'data' => [
                                      '*' => ['id', 'text', 'image'],
                                  ],
                              ]);

    $this->assertEquals($response->json('data.0.id'), 4);

    $this->assertCount(5, $response->json('data'));
});

