<?php

namespace Tests\Feature;

use App\Http\Resources\Population\RecordsAvgResource;
use App\Models\Population;
use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PopulationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test population record ok
     */
    public function testPopulationRecords(): void
    {
        $state = State::factory()->has(Population::factory()->count(3))->create();

        $response = $this->get("/api/state/population-records/{$state->slug}");

        $response->assertOk();

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'year',
                    'population',
                ],
            ],
        ]);

        $response->assertJson(fn (AssertableJson $json) => $json->has('data', 3)
        );
    }

    /**
     * Test population record with not found state
     */
    public function testPopulationRecordsWithNotFoundState(): void
    {
        $response = $this->get('/api/state/population-records/does-not-exist');

        $response->assertNotFound();
    }

    /**
     * Test population record avg by state
     */
    public function testPopulationRecordsAvg(): void
    {
        $state = State::factory()->has(Population::factory()->count(3))->create();

        $response = $this->get("/api/state/population-records/{$state->slug}/avg");

        $response->assertOk();

        $resource = new RecordsAvgResource($state);

        $response->assertExactJson($resource->response()->getData(true));
    }
}
