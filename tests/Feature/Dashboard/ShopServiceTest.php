<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\ShopService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class ShopServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_shop_services()
    {
        $this->actingAsAdmin();

        ShopService::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.shop_services.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_shop_service_details()
    {
        $this->actingAsAdmin();

        $shop_service = ShopService::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.shop_services.show', $shop_service))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_shop_services_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.shop_services.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_shop_service()
    {
        $this->actingAsAdmin();

        $shop_servicesCount = ShopService::count();

        $response = $this->post(
            route('dashboard.shop_services.store'),
            ShopService::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $shop_service = ShopService::all()->last();

        $this->assertEquals(ShopService::count(), $shop_servicesCount + 1);

        $this->assertEquals($shop_service->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_shop_services_edit_form()
    {
        $this->actingAsAdmin();

        $shop_service = ShopService::factory()->create();

        $this->get(route('dashboard.shop_services.edit', $shop_service))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_shop_service()
    {
        $this->actingAsAdmin();

        $shop_service = ShopService::factory()->create();

        $response = $this->put(
            route('dashboard.shop_services.update', $shop_service),
            ShopService::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $shop_service->refresh();

        $response->assertRedirect();

        $this->assertEquals($shop_service->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_shop_service()
    {
        $this->actingAsAdmin();

        $shop_service = ShopService::factory()->create();

        $shop_servicesCount = ShopService::count();

        $response = $this->delete(route('dashboard.shop_services.destroy', $shop_service));

        $response->assertRedirect();

        $this->assertEquals(ShopService::count(), $shop_servicesCount - 1);
    }

    /** @test */
    public function it_can_filter_shop_services_by_name()
    {
        $this->actingAsAdmin();

        ShopService::factory()->create([
            'name' => 'Foo',
        ]);

        ShopService::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.shop_services.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('shop_services.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
