<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_features()
    {
        $this->actingAsAdmin();

        Feature::factory()->count(2)->create();

        $this->getJson(route('api.features.index'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                    ],
                ],
            ]);
    }

    /** @test */
    public function test_features_select2_api()
    {
        Feature::factory()->count(5)->create();

        $response = $this->getJson(route('api.features.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.features.select', ['selected_id' => 4]))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 4);

        $this->assertCount(5, $response->json('data'));
    }

    /** @test */
    public function it_can_display_the_feature_details()
    {
        $this->actingAsAdmin();

        $feature = Feature::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.features.show', $feature))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                ],
            ]);

        $this->assertEquals($response->json('data.name'), 'Foo');
    }
}
