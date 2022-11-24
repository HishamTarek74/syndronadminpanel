<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\ShopCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShopCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_shop_categories()
    {
        $this->actingAsAdmin();

        ShopCategory::factory()->count(2)->create();

        $this->getJson(route('api.shop_categories.index'))
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
    public function test_shop_categories_select2_api()
    {
        ShopCategory::factory()->count(5)->create();

        $response = $this->getJson(route('api.shop_categories.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.shop_categories.select', ['selected_id' => 4]))
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
    public function it_can_display_the_shop_category_details()
    {
        $this->actingAsAdmin();

        $shop_category = ShopCategory::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.shop_categories.show', $shop_category))
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
