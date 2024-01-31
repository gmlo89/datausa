<?php

namespace App\Jobs;

use App\Models\Population;
use App\Models\State;
use App\Services\Integrations\Datausa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PopulationUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $year = (Population::max('year') ?? 2014) + 1;

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

                $state->populations()->firstOrCreate([
                    'year' => $item['Year'],
                ], [
                    'value' => $item['Population'],
                ]);
            }
            $year++;
        }
    }
}
