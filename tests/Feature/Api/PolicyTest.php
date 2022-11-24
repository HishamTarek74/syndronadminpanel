<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Policy;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_policies()
    {
        $this->actingAsAdmin();

        Policy::factory()->count(2)->create();

        $this->getJson(route('api.policies.index'))
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
    public function test_policies_select2_api()
    {
        Policy::factory()->count(5)->create();

        $response = $this->getJson(route('api.policies.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.policies.select', ['selected_id' => 4]))
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
    public function it_can_display_the_policy_details()
    {
        $this->actingAsAdmin();

        $policy = Policy::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.policies.show', $policy))
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
