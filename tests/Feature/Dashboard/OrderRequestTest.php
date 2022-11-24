<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\OrderRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_order_requests()
    {
        $this->actingAsAdmin();

        OrderRequest::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.order_requests.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_order_request_details()
    {
        $this->actingAsAdmin();

        $order_request = OrderRequest::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.order_requests.show', $order_request))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_order_requests_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.order_requests.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_order_request()
    {
        $this->actingAsAdmin();

        $order_requestsCount = OrderRequest::count();

        $response = $this->post(
            route('dashboard.order_requests.store'),
            OrderRequest::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $order_request = OrderRequest::all()->last();

        $this->assertEquals(OrderRequest::count(), $order_requestsCount + 1);

        $this->assertEquals($order_request->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_order_requests_edit_form()
    {
        $this->actingAsAdmin();

        $order_request = OrderRequest::factory()->create();

        $this->get(route('dashboard.order_requests.edit', $order_request))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_order_request()
    {
        $this->actingAsAdmin();

        $order_request = OrderRequest::factory()->create();

        $response = $this->put(
            route('dashboard.order_requests.update', $order_request),
            OrderRequest::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $order_request->refresh();

        $response->assertRedirect();

        $this->assertEquals($order_request->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_order_request()
    {
        $this->actingAsAdmin();

        $order_request = OrderRequest::factory()->create();

        $order_requestsCount = OrderRequest::count();

        $response = $this->delete(route('dashboard.order_requests.destroy', $order_request));

        $response->assertRedirect();

        $this->assertEquals(OrderRequest::count(), $order_requestsCount - 1);
    }

    /** @test */
    public function it_can_filter_order_requests_by_name()
    {
        $this->actingAsAdmin();

        OrderRequest::factory()->create([
            'name' => 'Foo',
        ]);

        OrderRequest::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.order_requests.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('order_requests.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
