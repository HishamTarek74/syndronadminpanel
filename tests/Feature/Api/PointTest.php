<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Point;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PointTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_points()
    {
        $this->actingAsAdmin();

        Point::factory()->count(2)->create();

        $this->getJson(route('api.points.index'))
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
    public function test_points_select2_api()
    {
        Point::factory()->count(5)->create();

        $response = $this->getJson(route('api.points.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.points.select', ['selected_id' => 4]))
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
    public function it_can_display_the_point_details()
    {
        $this->actingAsAdmin();

        $point = Point::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.points.show', $point))
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
