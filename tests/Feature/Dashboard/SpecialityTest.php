<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Speciality;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class SpecialityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_specialities()
    {
        $this->actingAsAdmin();

        Speciality::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.specialities.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_speciality_details()
    {
        $this->actingAsAdmin();

        $speciality = Speciality::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.specialities.show', $speciality))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_specialities_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.specialities.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_speciality()
    {
        $this->actingAsAdmin();

        $specialitiesCount = Speciality::count();

        $response = $this->post(
            route('dashboard.specialities.store'),
            Speciality::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $speciality = Speciality::all()->last();

        $this->assertEquals(Speciality::count(), $specialitiesCount + 1);

        $this->assertEquals($speciality->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_specialities_edit_form()
    {
        $this->actingAsAdmin();

        $speciality = Speciality::factory()->create();

        $this->get(route('dashboard.specialities.edit', $speciality))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_speciality()
    {
        $this->actingAsAdmin();

        $speciality = Speciality::factory()->create();

        $response = $this->put(
            route('dashboard.specialities.update', $speciality),
            Speciality::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $speciality->refresh();

        $response->assertRedirect();

        $this->assertEquals($speciality->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_speciality()
    {
        $this->actingAsAdmin();

        $speciality = Speciality::factory()->create();

        $specialitiesCount = Speciality::count();

        $response = $this->delete(route('dashboard.specialities.destroy', $speciality));

        $response->assertRedirect();

        $this->assertEquals(Speciality::count(), $specialitiesCount - 1);
    }

    /** @test */
    public function it_can_filter_specialities_by_name()
    {
        $this->actingAsAdmin();

        Speciality::factory()->create([
            'name' => 'Foo',
        ]);

        Speciality::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.specialities.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('specialities.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
