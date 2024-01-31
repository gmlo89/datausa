<?php

namespace App\Console\Commands;

use App\Jobs\PopulationUpdate;
use Illuminate\Console\Command;

class GetPopulationData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-population-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        PopulationUpdate::dispatch();
    }
}
