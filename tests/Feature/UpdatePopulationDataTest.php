<?php

namespace Tests\Feature;

use App\Models\Population as ModelsPopulation;
use App\Models\State;
use App\Services\Population;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Tests\Traits\FakeDatausaApi;

class UpdatePopulationDataTest extends TestCase
{
    use RefreshDatabase, FakeDatausaApi;

    /**
     * Test if the updateData function run correctly 
     */
    public function testFirstUpdateData(): void
    {

        $this->mockDatausa();

        Population::updateData();

        $this->assertEquals(ModelsPopulation::min('year'), 2015);
        $this->assertEquals(ModelsPopulation::max('year'), now()->year);
        $this->assertEquals(State::count(), 3);
    }
}
