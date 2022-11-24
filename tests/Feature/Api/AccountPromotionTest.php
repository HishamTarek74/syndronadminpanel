<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\AccountPromotion;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountPromotionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_account_promotions()
    {
        $this->actingAsAdmin();

        AccountPromotion::factory()->count(2)->create();

        $this->getJson(route('api.account_promotions.index'))
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
    public function test_account_promotions_select2_api()
    {
        AccountPromotion::factory()->count(5)->create();

        $response = $this->getJson(route('api.account_promotions.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.account_promotions.select', ['selected_id' => 4]))
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
    public function it_can_display_the_account_promotion_details()
    {
        $this->actingAsAdmin();

        $account_promotion = AccountPromotion::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.account_promotions.show', $account_promotion))
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
