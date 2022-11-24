<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Ad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class AdTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_ads()
    {
        $this->actingAsAdmin();

        Ad::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.ads.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_ad_details()
    {
        $this->actingAsAdmin();

        $ad = Ad::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.ads.show', $ad))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_ads_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.ads.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_ad()
    {
        $this->actingAsAdmin();

        $adsCount = Ad::count();

        $response = $this->post(
            route('dashboard.ads.store'),
            Ad::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $ad = Ad::all()->last();

        $this->assertEquals(Ad::count(), $adsCount + 1);

        $this->assertEquals($ad->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_ads_edit_form()
    {
        $this->actingAsAdmin();

        $ad = Ad::factory()->create();

        $this->get(route('dashboard.ads.edit', $ad))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_ad()
    {
        $this->actingAsAdmin();

        $ad = Ad::factory()->create();

        $response = $this->put(
            route('dashboard.ads.update', $ad),
            Ad::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $ad->refresh();

        $response->assertRedirect();

        $this->assertEquals($ad->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_ad()
    {
        $this->actingAsAdmin();

        $ad = Ad::factory()->create();

        $adsCount = Ad::count();

        $response = $this->delete(route('dashboard.ads.destroy', $ad));

        $response->assertRedirect();

        $this->assertEquals(Ad::count(), $adsCount - 1);
    }

    /** @test */
    public function it_can_filter_ads_by_name()
    {
        $this->actingAsAdmin();

        Ad::factory()->create([
            'name' => 'Foo',
        ]);

        Ad::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.ads.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('ads.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
