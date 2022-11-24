<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Policy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class PolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_policies()
    {
        $this->actingAsAdmin();

        Policy::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.policies.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_policy_details()
    {
        $this->actingAsAdmin();

        $policy = Policy::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.policies.show', $policy))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_policies_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.policies.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_policy()
    {
        $this->actingAsAdmin();

        $policiesCount = Policy::count();

        $response = $this->post(
            route('dashboard.policies.store'),
            Policy::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $policy = Policy::all()->last();

        $this->assertEquals(Policy::count(), $policiesCount + 1);

        $this->assertEquals($policy->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_policies_edit_form()
    {
        $this->actingAsAdmin();

        $policy = Policy::factory()->create();

        $this->get(route('dashboard.policies.edit', $policy))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_policy()
    {
        $this->actingAsAdmin();

        $policy = Policy::factory()->create();

        $response = $this->put(
            route('dashboard.policies.update', $policy),
            Policy::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $policy->refresh();

        $response->assertRedirect();

        $this->assertEquals($policy->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_policy()
    {
        $this->actingAsAdmin();

        $policy = Policy::factory()->create();

        $policiesCount = Policy::count();

        $response = $this->delete(route('dashboard.policies.destroy', $policy));

        $response->assertRedirect();

        $this->assertEquals(Policy::count(), $policiesCount - 1);
    }

    /** @test */
    public function it_can_filter_policies_by_name()
    {
        $this->actingAsAdmin();

        Policy::factory()->create([
            'name' => 'Foo',
        ]);

        Policy::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.policies.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('policies.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
