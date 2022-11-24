<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Collaborator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CollaboratorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_collaborators()
    {
        $this->actingAsAdmin();

        Collaborator::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.collaborators.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_collaborator_details()
    {
        $this->actingAsAdmin();

        $collaborator = Collaborator::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.collaborators.show', $collaborator))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_collaborators_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.collaborators.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_collaborator()
    {
        $this->actingAsAdmin();

        $collaboratorsCount = Collaborator::count();

        $response = $this->post(
            route('dashboard.collaborators.store'),
            Collaborator::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $collaborator = Collaborator::all()->last();

        $this->assertEquals(Collaborator::count(), $collaboratorsCount + 1);

        $this->assertEquals($collaborator->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_collaborators_edit_form()
    {
        $this->actingAsAdmin();

        $collaborator = Collaborator::factory()->create();

        $this->get(route('dashboard.collaborators.edit', $collaborator))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_collaborator()
    {
        $this->actingAsAdmin();

        $collaborator = Collaborator::factory()->create();

        $response = $this->put(
            route('dashboard.collaborators.update', $collaborator),
            Collaborator::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $collaborator->refresh();

        $response->assertRedirect();

        $this->assertEquals($collaborator->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_collaborator()
    {
        $this->actingAsAdmin();

        $collaborator = Collaborator::factory()->create();

        $collaboratorsCount = Collaborator::count();

        $response = $this->delete(route('dashboard.collaborators.destroy', $collaborator));

        $response->assertRedirect();

        $this->assertEquals(Collaborator::count(), $collaboratorsCount - 1);
    }

    /** @test */
    public function it_can_filter_collaborators_by_name()
    {
        $this->actingAsAdmin();

        Collaborator::factory()->create([
            'name' => 'Foo',
        ]);

        Collaborator::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.collaborators.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('collaborators.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
