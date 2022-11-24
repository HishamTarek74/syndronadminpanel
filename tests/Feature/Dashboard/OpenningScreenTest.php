<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\OpenningScreen;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OpenningScreenTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_openning_screens()
    {
        $this->actingAsAdmin();

        OpenningScreen::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.openning_screens.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_openning_screen_details()
    {
        $this->actingAsAdmin();

        $openning_screen = OpenningScreen::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.openning_screens.show', $openning_screen))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_openning_screens_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.openning_screens.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_openning_screen()
    {
        $this->actingAsAdmin();

        $openning_screensCount = OpenningScreen::count();

        $response = $this->post(
            route('dashboard.openning_screens.store'),
            OpenningScreen::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $openning_screen = OpenningScreen::all()->last();

        $this->assertEquals(OpenningScreen::count(), $openning_screensCount + 1);

        $this->assertEquals($openning_screen->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_openning_screens_edit_form()
    {
        $this->actingAsAdmin();

        $openning_screen = OpenningScreen::factory()->create();

        $this->get(route('dashboard.openning_screens.edit', $openning_screen))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_openning_screen()
    {
        $this->actingAsAdmin();

        $openning_screen = OpenningScreen::factory()->create();

        $response = $this->put(
            route('dashboard.openning_screens.update', $openning_screen),
            OpenningScreen::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $openning_screen->refresh();

        $response->assertRedirect();

        $this->assertEquals($openning_screen->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_openning_screen()
    {
        $this->actingAsAdmin();

        $openning_screen = OpenningScreen::factory()->create();

        $openning_screensCount = OpenningScreen::count();

        $response = $this->delete(route('dashboard.openning_screens.destroy', $openning_screen));

        $response->assertRedirect();

        $this->assertEquals(OpenningScreen::count(), $openning_screensCount - 1);
    }

    /** @test */
    public function it_can_filter_openning_screens_by_name()
    {
        $this->actingAsAdmin();

        OpenningScreen::factory()->create([
            'name' => 'Foo',
        ]);

        OpenningScreen::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.openning_screens.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('openning_screens.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
