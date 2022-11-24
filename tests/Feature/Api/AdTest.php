<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Tests\TestCase;
use App\Models\Ad;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_ads()
    {
        $this->actingAsAdmin();

        Ad::factory()->count(2)->create();

        $this->getJson(route('api.ads.index'))
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
    public function test_ads_select2_api()
    {
        Ad::factory()->count(5)->create();

        $response = $this->getJson(route('api.ads.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.ads.select', ['selected_id' => 4]))
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
    public function it_can_display_the_ad_details()
    {
        $this->actingAsAdmin();

        $ad = Ad::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.ads.show', $ad))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                ],
            ]);

        $this->assertEquals($response->json('data.name'), 'Foo');
    }

    /** @test */
    public function it_can_display_favorite_ad()
    {
        $user=User::factory()->create();
        $ad=Ad::factory()->create();

        $this->actingAs($user)->postJson(route('api.favorite.ad.store'),['ad_id'=>$ad->id])->assertSuccessful();

        $this->actingAs($user)
            ->getJson(route('api.favorite.ad.index'))
            ->assertSuccessful()
            ->assertJsonFragment(['id'=>$ad->id,'is_favorite'=>true]);

        $this->actingAs($user)
            ->getJson(route('api.ads.index'))
            ->assertSuccessful()
            ->assertJsonFragment(['id'=>$ad->id,'is_favorite'=>true]);
    }
}
