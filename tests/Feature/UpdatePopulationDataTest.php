<?php

namespace Tests\Feature;

use App\Jobs\PopulationUpdate;
use App\Models\Population as ModelsPopulation;
use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\FakeDatausaApi;

class UpdatePopulationDataTest extends TestCase
{
    use FakeDatausaApi, RefreshDatabase;

    /**
     * Test if the updateData function run correctly
     */
    public function testFirstUpdateData(): void
    {

        $this->mockDatausa();

        PopulationUpdate::dispatch();

        $this->assertEquals(ModelsPopulation::min('year'), 2015);
        $this->assertEquals(ModelsPopulation::max('year'), now()->year);
        $this->assertEquals(State::count(), 3);
    }
}
