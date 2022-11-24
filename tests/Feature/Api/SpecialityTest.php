<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Speciality;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpecialityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_specialities()
    {
        $this->actingAsAdmin();

        Speciality::factory()->count(2)->create();

        $this->getJson(route('api.specialities.index'))
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
    public function test_specialities_select2_api()
    {
        Speciality::factory()->count(5)->create();

        $response = $this->getJson(route('api.specialities.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.specialities.select', ['selected_id' => 4]))
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
    public function it_can_display_the_speciality_details()
    {
        $this->actingAsAdmin();

        $speciality = Speciality::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.specialities.show', $speciality))
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
