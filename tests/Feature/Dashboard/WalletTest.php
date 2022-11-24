<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WalletTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_wallets()
    {
        $this->actingAsAdmin();

        Wallet::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.wallets.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_wallet_details()
    {
        $this->actingAsAdmin();

        $wallet = Wallet::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.wallets.show', $wallet))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_wallets_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.wallets.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_wallet()
    {
        $this->actingAsAdmin();

        $walletsCount = Wallet::count();

        $response = $this->post(
            route('dashboard.wallets.store'),
            Wallet::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $wallet = Wallet::all()->last();

        $this->assertEquals(Wallet::count(), $walletsCount + 1);

        $this->assertEquals($wallet->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_wallets_edit_form()
    {
        $this->actingAsAdmin();

        $wallet = Wallet::factory()->create();

        $this->get(route('dashboard.wallets.edit', $wallet))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_wallet()
    {
        $this->actingAsAdmin();

        $wallet = Wallet::factory()->create();

        $response = $this->put(
            route('dashboard.wallets.update', $wallet),
            Wallet::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $wallet->refresh();

        $response->assertRedirect();

        $this->assertEquals($wallet->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_wallet()
    {
        $this->actingAsAdmin();

        $wallet = Wallet::factory()->create();

        $walletsCount = Wallet::count();

        $response = $this->delete(route('dashboard.wallets.destroy', $wallet));

        $response->assertRedirect();

        $this->assertEquals(Wallet::count(), $walletsCount - 1);
    }

    /** @test */
    public function it_can_filter_wallets_by_name()
    {
        $this->actingAsAdmin();

        Wallet::factory()->create([
            'name' => 'Foo',
        ]);

        Wallet::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.wallets.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('wallets.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
