<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\FilteredWord;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FilteredWordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_filtered_words()
    {
        $this->actingAsAdmin();

        FilteredWord::factory()->count(2)->create();

        $this->getJson(route('api.filtered_words.index'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                    ],
                ],
            ]);
    }

    /** @test */
    public function test_filtered_words_select2_api()
    {
        FilteredWord::factory()->count(5)->create();

        $response = $this->getJson(route('api.filtered_words.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.filtered_words.select', ['selected_id' => 4]))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 4);

        $this->assertCount(5, $response->json('data'));
    }

    /** @test */
    public function it_can_display_the_filtered_word_details()
    {
        $this->actingAsAdmin();

        $filtered_word = FilteredWord::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.filtered_words.show', $filtered_word))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                ],
            ]);

        $this->assertEquals($response->json('data.name'), 'Foo');
    }
}
