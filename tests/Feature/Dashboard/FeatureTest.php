<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class FeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_features()
    {
        $this->actingAsAdmin();

        Feature::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.features.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_feature_details()
    {
        $this->actingAsAdmin();

        $feature = Feature::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.features.show', $feature))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_features_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.features.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_feature()
    {
        $this->actingAsAdmin();

        $featuresCount = Feature::count();

        $response = $this->post(
            route('dashboard.features.store'),
            Feature::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $feature = Feature::all()->last();

        $this->assertEquals(Feature::count(), $featuresCount + 1);

        $this->assertEquals($feature->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_features_edit_form()
    {
        $this->actingAsAdmin();

        $feature = Feature::factory()->create();

        $this->get(route('dashboard.features.edit', $feature))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_feature()
    {
        $this->actingAsAdmin();

        $feature = Feature::factory()->create();

        $response = $this->put(
            route('dashboard.features.update', $feature),
            Feature::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $feature->refresh();

        $response->assertRedirect();

        $this->assertEquals($feature->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_feature()
    {
        $this->actingAsAdmin();

        $feature = Feature::factory()->create();

        $featuresCount = Feature::count();

        $response = $this->delete(route('dashboard.features.destroy', $feature));

        $response->assertRedirect();

        $this->assertEquals(Feature::count(), $featuresCount - 1);
    }

    /** @test */
    public function it_can_filter_features_by_name()
    {
        $this->actingAsAdmin();

        Feature::factory()->create([
            'name' => 'Foo',
        ]);

        Feature::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.features.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('features.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
