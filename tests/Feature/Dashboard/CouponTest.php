<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CouponTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_coupons()
    {
        $this->actingAsAdmin();

        Coupon::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.coupons.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_coupon_details()
    {
        $this->actingAsAdmin();

        $coupon = Coupon::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.coupons.show', $coupon))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_coupons_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.coupons.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_coupon()
    {
        $this->actingAsAdmin();

        $couponsCount = Coupon::count();

        $response = $this->post(
            route('dashboard.coupons.store'),
            Coupon::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $coupon = Coupon::all()->last();

        $this->assertEquals(Coupon::count(), $couponsCount + 1);

        $this->assertEquals($coupon->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_coupons_edit_form()
    {
        $this->actingAsAdmin();

        $coupon = Coupon::factory()->create();

        $this->get(route('dashboard.coupons.edit', $coupon))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_coupon()
    {
        $this->actingAsAdmin();

        $coupon = Coupon::factory()->create();

        $response = $this->put(
            route('dashboard.coupons.update', $coupon),
            Coupon::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $coupon->refresh();

        $response->assertRedirect();

        $this->assertEquals($coupon->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_coupon()
    {
        $this->actingAsAdmin();

        $coupon = Coupon::factory()->create();

        $couponsCount = Coupon::count();

        $response = $this->delete(route('dashboard.coupons.destroy', $coupon));

        $response->assertRedirect();

        $this->assertEquals(Coupon::count(), $couponsCount - 1);
    }

    /** @test */
    public function it_can_filter_coupons_by_name()
    {
        $this->actingAsAdmin();

        Coupon::factory()->create([
            'name' => 'Foo',
        ]);

        Coupon::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.coupons.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('coupons.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
