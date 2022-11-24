<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Point;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PointTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_points()
    {
        $this->actingAsAdmin();

        Point::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.points.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_point_details()
    {
        $this->actingAsAdmin();

        $point = Point::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.points.show', $point))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_points_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.points.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_point()
    {
        $this->actingAsAdmin();

        $pointsCount = Point::count();

        $response = $this->post(
            route('dashboard.points.store'),
            Point::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $point = Point::all()->last();

        $this->assertEquals(Point::count(), $pointsCount + 1);

        $this->assertEquals($point->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_points_edit_form()
    {
        $this->actingAsAdmin();

        $point = Point::factory()->create();

        $this->get(route('dashboard.points.edit', $point))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_point()
    {
        $this->actingAsAdmin();

        $point = Point::factory()->create();

        $response = $this->put(
            route('dashboard.points.update', $point),
            Point::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $point->refresh();

        $response->assertRedirect();

        $this->assertEquals($point->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_point()
    {
        $this->actingAsAdmin();

        $point = Point::factory()->create();

        $pointsCount = Point::count();

        $response = $this->delete(route('dashboard.points.destroy', $point));

        $response->assertRedirect();

        $this->assertEquals(Point::count(), $pointsCount - 1);
    }

    /** @test */
    public function it_can_filter_points_by_name()
    {
        $this->actingAsAdmin();

        Point::factory()->create([
            'name' => 'Foo',
        ]);

        Point::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.points.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('points.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
