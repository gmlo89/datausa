<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Population\RecordsAvgResource;
use App\Http\Resources\Population\RecordsResource;
use App\Models\State;

class PopulationController extends Controller
{
    /**
     * Get the populations record by State
     */
    public function populationRecords(State $state)
    {
        return RecordsResource::collection($state->populations);
    }

    /**
     * Get the population record avg by state
     */
    public function populationRecordsAvg(State $state)
    {
        return new RecordsAvgResource($state);
    }
}
