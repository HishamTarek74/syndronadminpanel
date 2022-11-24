<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\ShopCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class ShopCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_shop_categories()
    {
        $this->actingAsAdmin();

        ShopCategory::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.shop_categories.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_shop_category_details()
    {
        $this->actingAsAdmin();

        $shop_category = ShopCategory::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.shop_categories.show', $shop_category))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_shop_categories_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.shop_categories.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_shop_category()
    {
        $this->actingAsAdmin();

        $shop_categoriesCount = ShopCategory::count();

        $response = $this->post(
            route('dashboard.shop_categories.store'),
            ShopCategory::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $shop_category = ShopCategory::all()->last();

        $this->assertEquals(ShopCategory::count(), $shop_categoriesCount + 1);

        $this->assertEquals($shop_category->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_shop_categories_edit_form()
    {
        $this->actingAsAdmin();

        $shop_category = ShopCategory::factory()->create();

        $this->get(route('dashboard.shop_categories.edit', $shop_category))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_shop_category()
    {
        $this->actingAsAdmin();

        $shop_category = ShopCategory::factory()->create();

        $response = $this->put(
            route('dashboard.shop_categories.update', $shop_category),
            ShopCategory::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $shop_category->refresh();

        $response->assertRedirect();

        $this->assertEquals($shop_category->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_shop_category()
    {
        $this->actingAsAdmin();

        $shop_category = ShopCategory::factory()->create();

        $shop_categoriesCount = ShopCategory::count();

        $response = $this->delete(route('dashboard.shop_categories.destroy', $shop_category));

        $response->assertRedirect();

        $this->assertEquals(ShopCategory::count(), $shop_categoriesCount - 1);
    }

    /** @test */
    public function it_can_filter_shop_categories_by_name()
    {
        $this->actingAsAdmin();

        ShopCategory::factory()->create([
            'name' => 'Foo',
        ]);

        ShopCategory::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.shop_categories.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('shop_categories.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
