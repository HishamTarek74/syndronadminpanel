<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WalletTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_wallets()
    {
        $this->actingAsAdmin();

        Wallet::factory()->count(2)->create();

        $this->getJson(route('api.wallets.index'))
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
    public function test_wallets_select2_api()
    {
        Wallet::factory()->count(5)->create();

        $response = $this->getJson(route('api.wallets.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.wallets.select', ['selected_id' => 4]))
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
    public function it_can_display_the_wallet_details()
    {
        $this->actingAsAdmin();

        $wallet = Wallet::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.wallets.show', $wallet))
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
