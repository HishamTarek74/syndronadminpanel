<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Option;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class OptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_options()
    {
        $this->actingAsAdmin();

        Option::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.options.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_option_details()
    {
        $this->actingAsAdmin();

        $option = Option::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.options.show', $option))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_options_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.options.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_option()
    {
        $this->actingAsAdmin();

        $optionsCount = Option::count();

        $response = $this->post(
            route('dashboard.options.store'),
            Option::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $option = Option::all()->last();

        $this->assertEquals(Option::count(), $optionsCount + 1);

        $this->assertEquals($option->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_options_edit_form()
    {
        $this->actingAsAdmin();

        $option = Option::factory()->create();

        $this->get(route('dashboard.options.edit', $option))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_option()
    {
        $this->actingAsAdmin();

        $option = Option::factory()->create();

        $response = $this->put(
            route('dashboard.options.update', $option),
            Option::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $option->refresh();

        $response->assertRedirect();

        $this->assertEquals($option->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_option()
    {
        $this->actingAsAdmin();

        $option = Option::factory()->create();

        $optionsCount = Option::count();

        $response = $this->delete(route('dashboard.options.destroy', $option));

        $response->assertRedirect();

        $this->assertEquals(Option::count(), $optionsCount - 1);
    }

    /** @test */
    public function it_can_filter_options_by_name()
    {
        $this->actingAsAdmin();

        Option::factory()->create([
            'name' => 'Foo',
        ]);

        Option::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.options.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('options.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
