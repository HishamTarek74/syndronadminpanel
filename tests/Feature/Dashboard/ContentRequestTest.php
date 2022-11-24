<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\ContentRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class ContentRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_content_requests()
    {
        $this->actingAsAdmin();

        ContentRequest::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.content_requests.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_content_request_details()
    {
        $this->actingAsAdmin();

        $content_request = ContentRequest::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.content_requests.show', $content_request))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_content_requests_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.content_requests.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_content_request()
    {
        $this->actingAsAdmin();

        $content_requestsCount = ContentRequest::count();

        $response = $this->post(
            route('dashboard.content_requests.store'),
            ContentRequest::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $content_request = ContentRequest::all()->last();

        $this->assertEquals(ContentRequest::count(), $content_requestsCount + 1);

        $this->assertEquals($content_request->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_content_requests_edit_form()
    {
        $this->actingAsAdmin();

        $content_request = ContentRequest::factory()->create();

        $this->get(route('dashboard.content_requests.edit', $content_request))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_content_request()
    {
        $this->actingAsAdmin();

        $content_request = ContentRequest::factory()->create();

        $response = $this->put(
            route('dashboard.content_requests.update', $content_request),
            ContentRequest::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $content_request->refresh();

        $response->assertRedirect();

        $this->assertEquals($content_request->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_content_request()
    {
        $this->actingAsAdmin();

        $content_request = ContentRequest::factory()->create();

        $content_requestsCount = ContentRequest::count();

        $response = $this->delete(route('dashboard.content_requests.destroy', $content_request));

        $response->assertRedirect();

        $this->assertEquals(ContentRequest::count(), $content_requestsCount - 1);
    }

    /** @test */
    public function it_can_filter_content_requests_by_name()
    {
        $this->actingAsAdmin();

        ContentRequest::factory()->create([
            'name' => 'Foo',
        ]);

        ContentRequest::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.content_requests.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('content_requests.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
