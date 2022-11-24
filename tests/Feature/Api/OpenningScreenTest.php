<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\OpenningScreen;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OpenningScreenTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_openning_screens()
    {
        $this->actingAsAdmin();

        OpenningScreen::factory()->count(2)->create();

        $this->getJson(route('api.openning_screens.index'))
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
    public function test_openning_screens_select2_api()
    {
        OpenningScreen::factory()->count(5)->create();

        $response = $this->getJson(route('api.openning_screens.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.openning_screens.select', ['selected_id' => 4]))
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
    public function it_can_display_the_openning_screen_details()
    {
        $this->actingAsAdmin();

        $openning_screen = OpenningScreen::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.openning_screens.show', $openning_screen))
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
