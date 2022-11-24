<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\FilteredWord;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class FilteredWordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_filtered_words()
    {
        $this->actingAsAdmin();

        FilteredWord::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.filtered_words.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_filtered_word_details()
    {
        $this->actingAsAdmin();

        $filtered_word = FilteredWord::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.filtered_words.show', $filtered_word))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_filtered_words_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.filtered_words.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_filtered_word()
    {
        $this->actingAsAdmin();

        $filtered_wordsCount = FilteredWord::count();

        $response = $this->post(
            route('dashboard.filtered_words.store'),
            FilteredWord::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $filtered_word = FilteredWord::all()->last();

        $this->assertEquals(FilteredWord::count(), $filtered_wordsCount + 1);

        $this->assertEquals($filtered_word->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_filtered_words_edit_form()
    {
        $this->actingAsAdmin();

        $filtered_word = FilteredWord::factory()->create();

        $this->get(route('dashboard.filtered_words.edit', $filtered_word))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_filtered_word()
    {
        $this->actingAsAdmin();

        $filtered_word = FilteredWord::factory()->create();

        $response = $this->put(
            route('dashboard.filtered_words.update', $filtered_word),
            FilteredWord::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $filtered_word->refresh();

        $response->assertRedirect();

        $this->assertEquals($filtered_word->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_filtered_word()
    {
        $this->actingAsAdmin();

        $filtered_word = FilteredWord::factory()->create();

        $filtered_wordsCount = FilteredWord::count();

        $response = $this->delete(route('dashboard.filtered_words.destroy', $filtered_word));

        $response->assertRedirect();

        $this->assertEquals(FilteredWord::count(), $filtered_wordsCount - 1);
    }

    /** @test */
    public function it_can_filter_filtered_words_by_name()
    {
        $this->actingAsAdmin();

        FilteredWord::factory()->create([
            'name' => 'Foo',
        ]);

        FilteredWord::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.filtered_words.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('filtered_words.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
