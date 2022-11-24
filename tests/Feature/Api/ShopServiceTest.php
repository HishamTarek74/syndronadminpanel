<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\ShopService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShopServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_shop_services()
    {
        $this->actingAsAdmin();

        ShopService::factory()->count(2)->create();

        $this->getJson(route('api.shop_services.index'))
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
    public function test_shop_services_select2_api()
    {
        ShopService::factory()->count(5)->create();

        $response = $this->getJson(route('api.shop_services.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.shop_services.select', ['selected_id' => 4]))
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
    public function it_can_display_the_shop_service_details()
    {
        $this->actingAsAdmin();

        $shop_service = ShopService::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.shop_services.show', $shop_service))
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
