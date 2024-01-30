<?php

namespace App\Services;

use App\Models\Population as ModelsPopulation;
use App\Models\State;
use App\Services\Integrations\Datausa;

class Population
{
    /**
     * Get the population data since the last update (or 2015) until the current year
     */
    public static function updateData(): void
    {
        $year = (ModelsPopulation::max('year') ?? 2014) + 1;

        $currentYear = now()->year;

        while ($year <= $currentYear) {
            $data = Datausa::instance()->getPopulationByState($year);
            foreach ($data as $item) {
                $state = State::firstOrCreate([
                    'slug' => $item['Slug State'],
                ], [
                    'name' => $item['State'],
                    'custom_id' => $item['ID State'],
                ]);
                
                if( $state->populations()->where('year', $item["Year"])->first() )
                    continue;

                $state->populations()->create([
                    'year' => $item['Year'],
                    'value' => $item['Population'],
                ]);
            }
            $year++;
        }
    }
}
