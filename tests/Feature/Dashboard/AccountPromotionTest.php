<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\AccountPromotion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class AccountPromotionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_account_promotions()
    {
        $this->actingAsAdmin();

        AccountPromotion::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.account_promotions.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_account_promotion_details()
    {
        $this->actingAsAdmin();

        $account_promotion = AccountPromotion::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.account_promotions.show', $account_promotion))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_account_promotions_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.account_promotions.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_account_promotion()
    {
        $this->actingAsAdmin();

        $account_promotionsCount = AccountPromotion::count();

        $response = $this->post(
            route('dashboard.account_promotions.store'),
            AccountPromotion::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $account_promotion = AccountPromotion::all()->last();

        $this->assertEquals(AccountPromotion::count(), $account_promotionsCount + 1);

        $this->assertEquals($account_promotion->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_account_promotions_edit_form()
    {
        $this->actingAsAdmin();

        $account_promotion = AccountPromotion::factory()->create();

        $this->get(route('dashboard.account_promotions.edit', $account_promotion))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_account_promotion()
    {
        $this->actingAsAdmin();

        $account_promotion = AccountPromotion::factory()->create();

        $response = $this->put(
            route('dashboard.account_promotions.update', $account_promotion),
            AccountPromotion::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $account_promotion->refresh();

        $response->assertRedirect();

        $this->assertEquals($account_promotion->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_account_promotion()
    {
        $this->actingAsAdmin();

        $account_promotion = AccountPromotion::factory()->create();

        $account_promotionsCount = AccountPromotion::count();

        $response = $this->delete(route('dashboard.account_promotions.destroy', $account_promotion));

        $response->assertRedirect();

        $this->assertEquals(AccountPromotion::count(), $account_promotionsCount - 1);
    }

    /** @test */
    public function it_can_filter_account_promotions_by_name()
    {
        $this->actingAsAdmin();

        AccountPromotion::factory()->create([
            'name' => 'Foo',
        ]);

        AccountPromotion::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.account_promotions.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('account_promotions.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
