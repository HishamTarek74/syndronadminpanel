<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class ProviderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_providers()
    {
        $this->actingAsAdmin();

        Provider::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.providers.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_provider_details()
    {
        $this->actingAsAdmin();

        $provider = Provider::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.providers.show', $provider))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_providers_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.providers.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_provider()
    {
        $this->actingAsAdmin();

        $providersCount = Provider::count();

        $response = $this->post(
            route('dashboard.providers.store'),
            Provider::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $provider = Provider::all()->last();

        $this->assertEquals(Provider::count(), $providersCount + 1);

        $this->assertEquals($provider->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_providers_edit_form()
    {
        $this->actingAsAdmin();

        $provider = Provider::factory()->create();

        $this->get(route('dashboard.providers.edit', $provider))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_provider()
    {
        $this->actingAsAdmin();

        $provider = Provider::factory()->create();

        $response = $this->put(
            route('dashboard.providers.update', $provider),
            Provider::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $provider->refresh();

        $response->assertRedirect();

        $this->assertEquals($provider->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_provider()
    {
        $this->actingAsAdmin();

        $provider = Provider::factory()->create();

        $providersCount = Provider::count();

        $response = $this->delete(route('dashboard.providers.destroy', $provider));

        $response->assertRedirect();

        $this->assertEquals(Provider::count(), $providersCount - 1);
    }

    /** @test */
    public function it_can_filter_providers_by_name()
    {
        $this->actingAsAdmin();

        Provider::factory()->create([
            'name' => 'Foo',
        ]);

        Provider::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.providers.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('providers.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
