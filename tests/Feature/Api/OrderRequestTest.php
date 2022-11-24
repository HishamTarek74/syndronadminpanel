<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\OrderRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_order_requests()
    {
        $this->actingAsAdmin();

        OrderRequest::factory()->count(2)->create();

        $this->getJson(route('api.order_requests.index'))
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
    public function test_order_requests_select2_api()
    {
        OrderRequest::factory()->count(5)->create();

        $response = $this->getJson(route('api.order_requests.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.order_requests.select', ['selected_id' => 4]))
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
    public function it_can_display_the_order_request_details()
    {
        $this->actingAsAdmin();

        $order_request = OrderRequest::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.order_requests.show', $order_request))
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
